<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\TipoProyecto;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    public function index(){
        $proyectos = Proyecto::join('tipos_proyectos', 'tipos_proyectos.id_tipo_proyecto', '=', 'proyectos.id_tipo_proyecto')
            ->select('proyectos.*', 'tipos_proyectos.nombre as tipo_proyecto')->where('proyectos.id_user', '=', Auth::user()->id_user)->get();
        return view('admin.admin_proyectos', compact("proyectos"));
    }

    public function show_form_create(){
        $tipos_proyectos = TipoProyecto::select('*')->where('id_user', '=', Auth::user()->id_user)->get();
        return view('admin.crear_proyectos', compact("tipos_proyectos"));
    }

    public function show_form_edit($id){
        $proyecto = Proyecto::find($id);
        if($proyecto == null) return redirect()->route('listar_proyectos')->withErrors('No se encontro el proyecto');
        $tipos_proyectos = TipoProyecto::select('*')->where('id_user', '=', Auth::user()->id_user)->get();
        return view('admin.editar_proyecto', compact('proyecto', 'tipos_proyectos'));
    }

    public function guardar_proyecto(Request $request){
        if(isset($request->registrar_proyecto)){
            return $this->create($request);
        }elseif(isset($request->editar_proyecto)){
            return $this->update($request);
        }
    }

    private function create(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'url' => 'required|url|max:200',
            'id_tipo_proyecto' => 'required|exists:tipos_proyectos,id_tipo_proyecto',
            'imagen' => 'required|image|mimes:jpg,png,jpeg|max:5240',
            'descripcion' => 'required|string|min:3|max:500'
        ]);
        try {
            $txtImagen = time().'.'.$request->imagen->extension();  
            Proyecto::create([
                'nombre' => $request->nombre,
                'url' => $request->url,
                'id_tipo_proyecto' => $request->id_tipo_proyecto,
                'imagen' => $txtImagen,
                'descripcion' => $request->descripcion,
                'id_user' => Auth::user()->id_user
            ]);
            $request->imagen->move(public_path('uploads/img_proyectos'), $txtImagen);
            return redirect()->route('listar_proyectos')->withSuccess('Se registro con éxito');
        } catch (Exception $e) {
            return redirect()->route('listar_proyectos')->withErrors('Ocurrio un error: '.$e->getMessage());
        }
    }

    private function update(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'url' => 'required|url',
            'id_tipo_proyecto' => 'required|exists:tipos_proyectos,id_tipo_proyecto',
            'descripcion' => 'required|string|min:3|max:500'
        ]);
        $proyecto = Proyecto::find($request->id_proyecto);
        if($proyecto == null) return redirect()->route('listar_proyectos')->withErrors('No se encontro el proyecto');
        try {
            if($request->imagen != null){
                $request->validate([
                    'imagen' => 'required|image|mimes:jpg,png,jpeg|max:5240'
                ]);
                $txtImagen = $request->nombre.'.'.time().'.'.$request->imagen->extension();  
                $request->imagen->move(public_path('uploads/img_proyectos'), $txtImagen);
                unlink('uploads/img_proyectos/'.$proyecto->imagen);
                $proyecto->update([
                    'nombre' => $request->nombre,
                    'url' => $request->url,
                    'id_tipo_proyecto' => $request->id_tipo_proyecto,
                    'imagen' => $txtImagen,
                    'descripcion' => $request->descripcion,
                    'id_user' => Auth::user()->id_user
                ]);
            }else{
                $proyecto->update([
                    'nombre' => $request->nombre,
                    'url' => $request->url,
                    'id_tipo_proyecto' => $request->id_tipo_proyecto,
                    'descripcion' => $request->descripcion
                ]);
            }
            return redirect()->route('listar_proyectos')->withSuccess('Se modifico con éxito');
        } catch (Exception $e) {
            return redirect()->route('listar_proyectos')->withErrors('Ocurrio un error: '.$e->getMessage());
        }
    }
}
