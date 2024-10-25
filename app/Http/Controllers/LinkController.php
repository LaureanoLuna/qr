<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Qr;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('qr.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validamos los datos recibidos
        $request->validate([
            'qr_id' => ['required'],
            'url' => ['required', 'string'],
        ]);

        // Buscamos si existe un link activo para el qr indicado
        $activo = Link::where('qr_id', $request->qr_id)
            ->where('deshabilitado', false)
            ->first(); // Obtener el primer resultado

        // Creamos el nuevo link
        $link = Link::create($request->only(['qr_id', 'url'])); // Asegúrate de que solo los campos necesarios se pasen

        // Validamos que se haya podido crear
        if (!$link) {
            // Si no se pudo crear, retornamos un mensaje
            return response()->json(['mensaje' => 'No se pudo cargar el link'], 500); // Cambié el código de estado a 500 para error interno
        }
        // Si se creó satisfactoriamente, deshabilitamos el anterior activo si existe
        if ($activo) {
            $activo->deshabilitado = true;
            $activo->save(); // Guardamos los cambios
        }
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        //
    }
}
