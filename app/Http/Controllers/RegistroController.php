<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required|string',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'email|required',
            'password' => 'required|string',
            'numero_documento' => 'required|numeric',
        ]);
        if($data->fails()){
            return redirect()->back()
                ->withErrors($data)
                ->withInput();
        }

        try {
            DB::beginTransaction();
            $persona = Persona::create([
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'numero_documento' => $request->numero_documento,
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'persona_id' => $persona->id,
            ]);
            $user->assignRole('CLIENTE');
            DB::commit();
            return redirect()->route('login.index')->with('success', '¡Registro exitoso!');
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e); // para obtener más información sobre la excepción
            return redirect()->back()->withInput()->with('error','Error al crear el parámetro: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
