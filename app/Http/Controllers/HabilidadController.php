<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Habilidad;
use App\Models\User;
use Exception;

class HabilidadController extends Controller
{
    public function index(){
        $id_persona = $this->get_id_persona();
        $habilidades = Habilidad::where('id_persona', '=', $id_persona)->get();
        return view('admin.admin_habilidades', compact("habilidades"));
    }

    public function show_form_create(){
        return view('admin.crear_habilidades');
    }

    public function show_form_edit($id){
        $habilidad = Habilidad::find($id);
        if($habilidad == null) return redirect()->route('listar_habilidades')->withErrors('No se encontro la habilidad');
        return view('admin.editar_habilidades', compact('habilidad'));
    }

    public function guardar_habilidad(Request $request){
        if(isset($request->registrar_habilidad)){
            return $this->create($request);
        }elseif(isset($request->editar_habilidad)){
            return $this->update($request);
        }
    }

    private function create(Request $request){
        $this->validations($request);
        $id_persona = $this->get_id_persona();
        try {
            Habilidad::create([
                'id_persona' => $id_persona,
                'materia' => $request->nombre,
                'porcentaje' => $request->porcentaje
            ]);
            return redirect()->route('listar_habilidades')->withSuccess('Se registro con éxito');
        } catch (Exception $e) {
            return redirect()->route('listar_habilidades')->withErrors('Ocurrio un error: '.$e->getMessage());
        }
    }
    
    private function update(Request $request){
        $this->validations($request);
        $habilidad = Habilidad::find($request->id_habilidad);
        if($habilidad == null) return redirect()->route('listar_habilidades')->withErrors('No se encontro la habilidad');
        $id_persona = $this->get_id_persona();
        try{
            $habilidad->update([
                'id_persona' => $id_persona,
                'materia' => $request->nombre,
                'porcentaje' => $request->porcentaje
            ]);
            return redirect()->route('listar_habilidades')->withSuccess('Se modifico con éxito');
        } catch (Exception $e) {
            return redirect()->route('listar_habilidades')->withErrors('Ocurrio un error: '.$e->getMessage());
        }
    }

    private function validations(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:1|max:100',
            'porcentaje' => 'required'
        ]);
    }

    private function get_id_persona(){
        $persona = User::join('personas', 'personas.id_persona', '=', 'users.id_persona')
            ->select('personas.id_persona')
            ->where('users.id_user', '=', Auth::user()->id_user)->take(1)->get();
        return $persona[0]->id_persona;
    }
}
