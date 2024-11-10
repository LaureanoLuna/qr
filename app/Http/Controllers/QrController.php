<?php

namespace App\Http\Controllers;

use App\Models\Qr;
use App\Http\Controllers\LinkController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('qr.all', [json_encode(Qr::all())]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('qr.create');
    }


    public function store(Request $request)
    {
        //dd($request);
        try {
            // Validamos los datos recibidos
            $request->validate([
                'url' => ['required', 'string'],
            ]);


            // Creamos un nuevo QR
            $qr = Qr::create([
                'nombre' => $request->nombre,
                'isdinamico' => $request->isdinamico == "on" ? true : false,
                'usuario_id' => Auth::id() ?? 2,
            ]);

            // Verificamos si se creó el QR
            if ($qr) {
                // Crear una instancia de LinkController
                $linkController = new LinkController();
                // Llamar al método store para crear el link
                $bool = $linkController->store(new Request([
                    'qr_id' => $qr->id,
                    'url' => $request->url,
                ]));

                if (!$bool) {
                    return response()->json([
                        'mensaje' => 'No se pudo crear el Links',
                    ], 500);
                }
                return redirect(route('qr.view', ['id' => $qr->id]));
            }

            // Si no se pudo crear el QR, retornamos un mensaje de error
            return response()->json([
                'mensaje' => 'No se pudo crear el QR',
            ], 500);
        } catch (\Throwable $th) {
            return response()->json([
                'mensaje' => 'Error al crear el QR o el link',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        // Buscar el QR con enlaces activos
        $qr = $this->getQrWithActiveLinks($id);

        // Verificar si se encontró el QR y si tiene enlaces activos
        if (!$qr) {
            return $this->responseNotFound();
        }

        // Generar el código QR
        $qrCode = $this->generateQrCode($qr->links->first()->url, $qr->id);

        // Retornar la vista con el QR y el código generado
        return view('qr.view', compact('qr'))->with('qrCode', $qrCode);
    }

    private function getQrWithActiveLinks($id)
    {
        return Qr::with(['links' => function ($query) {
            $query->where('deshabilitado', false);
        }])->find($id);
    }

    private function responseNotFound()
    {
        return response()->json([
            'mensaje' => 'No se encontraron enlaces activos para este QR.'
        ], 404);
    }

    private function generateQrCode($url, $qrId)
    {
        $path = public_path('qr/' . $qrId . '.png');

        // Verificar si el directorio existe, si no, crearlo
        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        return QrCode::format('png')
            ->encoding('UTF-8')
            ->errorCorrection('H')
            ->size(200)
            ->generate($url, $path);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Qr $qr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $qrId = $request->qrId;
        $qr = Qr::find($qrId);

        if (!$qr) {
            return response()->json([
                'mensaje' => 'No se encontraron enlaces activos para este QR.'
            ], 404);
        }

        $qr->deshabilitado = !$qr->deshabilitado;
        $qr->save();
    }

    public function qrList()
    {
        $arrQrs = array();
        $userAuth = Auth::id();

        $qrList = Qr::with(['links' => function ($link) {
            $link->where('deshabilitado', false);
        }])->where('usuario_id', $userAuth)->get();

        foreach ($qrList as $qr) {
            array_push($arrQrs, [
                'qrData' => $qr,
                'qrImg' => $qrCode = QrCode::errorCorrection('H')
                    ->size(150)
                    ->generate($qr->links->first()->url)
            ]);
        }

        return view('qr.list', compact('arrQrs'));
    }
}
