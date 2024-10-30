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
        $qr = Qr::with(['links' => function ($query) {
            $query->where('deshabilitado', false);
        }])->find($id);

        if (!$qr || $qr->links->isEmpty()) {
            return response()->json([
                'mensaje' => 'No se encontraron enlaces activos para este QR.'
            ], 404);
        }
        $qrCode = QrCode::size(100)->generate($qr->links->first()->url);

        return view('qr.view', compact('qr'))->with('qrCode', $qrCode);
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
    public function update(Request $request, Qr $qr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Qr $qr)
    {
        //
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
                'qrImg' => $qrCode = QrCode::size(150)->generate($qr->links->first()->url)]);
        }

        return view('qr.list', compact('arrQrs'));
    }
}
