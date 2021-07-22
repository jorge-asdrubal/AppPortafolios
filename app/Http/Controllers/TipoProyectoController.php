<?php

namespace App\Http\Controllers;

use App\Models\TipoProyecto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipoProyectoController extends Controller
{
    public function index(){
        $tipos_proyectos = TipoProyecto::select('*')->where('id_user', '=', Auth::user()->id_user)->get();
        return view('admin.admin_tipos_proyectos', compact("tipos_proyectos"));
    }

    public function show_form_create(){
        return view('admin.crear_tipos_proyectos');
    }

    public function show_form_edit($id){
        $tipo_proyecto = TipoProyecto::find($id);
        if($tipo_proyecto == null) return redirect()->route('listar_tipos_proyectos')->withErrors('No se encontro el tipo de proyecto');
        return view('admin.editar_tipo_proyecto', compact('tipo_proyecto'));
    }

    public function guardar_tipo_proyecto(Request $request){
        if(isset($request->registrar_tipo_proyecto)){
            return $this->create($request);
        }elseif(isset($request->editar_tipo_proyecto)){
            return $this->update($request);
        }
    }

    private function create(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:1|max:100'
        ]);
        try {
            TipoProyecto::create([
                'nombre' => $request->nombre,
                'id_user' => Auth::user()->id_user
            ]);
            return redirect()->route('listar_tipos_proyectos')->withSuccess('Se registro con éxito');
        } catch (Exception $e) {
            return redirect()->route('listar_tipos_proyectos')->withErrors('Ocurrio un error: '.$e->getMessage());
        }
    }
    
    private function update(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:1|max:100'
        ]);
        $tipo_proyecto = TipoProyecto::find($request->id_tipo_proyecto);
        if($tipo_proyecto == null) return redirect()->route('listar_tipos_proyectos')->withErrors('No se encontro el tipo de proyecto');
        try{
            $tipo_proyecto->update([
                'nombre' => $request->nombre,
                'id_user' => Auth::user()->id_user
            ]);
            return redirect()->route('listar_tipos_proyectos')->withSuccess('Se modifico con éxito');
        } catch (Exception $e) {
            return redirect()->route('listar_tipos_proyectos')->withErrors('Ocurrio un error: '.$e->getMessage());
        }
    }
}
