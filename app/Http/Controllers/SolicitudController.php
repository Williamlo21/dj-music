<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Http\Requests\StoreSolicitudRequest;
use App\Http\Requests\UpdateSolicitudRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $solicitudes = Solicitud::where('user_id', Auth::user()->id)->get();
        return view('solicitud.index', compact('solicitudes'));
    }
    public function indexDJ(){

        // @dd('hola mundo');
        $solicitudes = Solicitud::orderByRaw("FIELD(status, 'EN ESPERA', 'ACEPTADO', 'RECHAZADO', 'CANCELADO') ASC")
        ->orderBy('created_at', 'ASC')
        ->get();

        return view('dj.solicitud.index', compact('solicitudes'));
    }
    public function aceptarSolicitud($solicitud_id)
    {
        $solicitud = Solicitud::find($solicitud_id);
        $solicitud->update([
            'status' => 'ACEPTADO'
        ]);
        return redirect()->route('solicitud.indexDJ');
    }

    public function rechazarSolicitud($solicitud_id)
    {
        $solicitud = Solicitud::find($solicitud_id);
        $solicitud->update([
            'status' => 'RECHAZADO'
        ]);
        return redirect()->route('solicitud.indexDJ');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('solicitud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSolicitudRequest $request)
    {
        $data = Validator::make($request->all(), [
            'cancion' => 'required|string',
        ]);
        if ($data->fails()) {
            return redirect()->back()
                ->withErrors($data)
                ->withInput();
        }

        try {
            DB::beginTransaction();
            $solicitud = Solicitud::create([
                'user_id' => Auth::user()->id,
                'cancion' => $request->cancion,
                'numero_documento' => $request->numero_documento,
            ]);
            DB::commit();
            return redirect()->route('solicitud.index')->with('success', '¡Solicitud exitosa!');
        } catch (\Exception $e) {
            dd($e); // para obtener más información sobre la excepción
            return redirect()->back()->withErrors(['error' => 'Error al realizar la solicitud: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSolicitudRequest $request, Solicitud $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
