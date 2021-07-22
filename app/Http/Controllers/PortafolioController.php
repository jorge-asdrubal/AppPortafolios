<?php

namespace App\Http\Controllers;

use App\Models\Habilidad;
use App\Models\Persona;
use App\Models\Portafolio;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\TipoProyecto;
use App\Models\User;
use Exception;
use Faker\Provider\ar_JO\Person;
use Illuminate\Support\Facades\Auth;

class PortafolioController extends Controller
{
    public function principal(){
        $portafolios = Portafolio::all();
        return view('portafolio.inicio', compact("portafolios"));
    }

    public function index($id){
        $portafolio = Portafolio::find($id);
        $proyectos = Proyecto::join('tipos_proyectos', 'tipos_proyectos.id_tipo_proyecto', '=', 'proyectos.id_tipo_proyecto')
            ->select('proyectos.*', 'tipos_proyectos.nombre as tipo_proyecto')
            ->where('proyectos.id_user','=',$portafolio->id_user)->get();
        $tipos_proyectos = TipoProyecto::where('id_user', '=', $portafolio->id_user)->get();
        $persona = User::join('portafolios', 'portafolios.id_user', '=', 'users.id_user')
            ->join('personas', 'personas.id_persona', '=', 'users.id_persona')
            ->select('personas.*')->where('portafolios.id_portafolio', '=', $id)->take(1)->get();
        return view('portafolio.portafolio', compact("persona","portafolio","proyectos", "tipos_proyectos"));
    }

    public function sobre_mi($id){
        $portafolio = Portafolio::find($id);
        $persona = User::join('portafolios', 'portafolios.id_user', '=', 'users.id_user')
            ->join('personas', 'personas.id_persona', '=', 'users.id_persona')
            ->select('personas.*')->where('portafolios.id_portafolio', '=', $id)->take(1)->get();
        $habilidades = Habilidad::where('id_persona', '=', $persona[0]->id_persona)->get();
        return view('portafolio.sobre_mi', compact("portafolio","persona", "habilidades"));
    }

    public function contactame($id){
        $portafolio = Portafolio::find($id);
        $persona = User::join('portafolios', 'portafolios.id_user', '=', 'users.id_user')
            ->join('personas', 'personas.id_persona', '=', 'users.id_persona')
            ->select('personas.*')->where('portafolios.id_portafolio', '=', $id)->take(1)->get();
        return view('portafolio.contactame', compact("portafolio","persona"));
    }

    public function show_form_portafolio(){
        $portafolio = Portafolio::join('users', 'users.id_user', '=', 'portafolios.id_user')
            ->select('portafolios.*')->where('portafolios.id_user', '=', Auth::user()->id_user)->take(1)->get();
        return view('admin.adm_portafolio', compact("portafolio"));
    }

    public function guardar_portafolio(Request $request){
        if (isset($request->registrar_portafolio)) {
            return $this->save($request);
        }elseif(isset($request->editar_portafolio)){
            return $this->update($request);
        }
    }

    private function update(Request $request){
        $portafolio = Portafolio::find($request->id_portafolio);
        try {
            if ($request->foto == null) { 
                $request->validate([
                    'nombre' => 'required|string|min:3|max:250'
                ]);
                $portafolio->update([
                    'nombre' => $request->nombre
                ]);
            }else{
                $request->validate([
                    'nombre' => 'required|string|min:3|max:250',
                    'foto' => 'required|image|mimes:jpg,jpeg,png|max:4096'
                ]);
                $txtImagen = time().'.'.$request->foto->extension();  
                $request->foto->move(public_path('uploads/img_portafolios'), $txtImagen);
                $portafolio->update([
                    'nombre' => $request->nombre,
                    'foto' => $txtImagen
                ]);
            }
            return back()->withSuccess('Se guardaron los cambios');
        } catch (Exception $e) {
            return back()->withErrors('Ocurrio un error: '.$e->getMessage());
        }
    }

    private function save(Request $request){
        try {
            if ($request->foto == null) {
                $request->validate([
                    'nombre' => 'required|string|min:3|max:250'
                ]);
                Portafolio::create([
                    'id_user' => Auth::user()->id_user,
                    'nombre' => $request->nombre,
                    'foto' => 'defecto_portafolio.png'
                ]);
            }else{
                $request->validate([
                    'nombre' => 'required|string|min:3|max:250',
                    'foto' => 'required|image|mimes:jpg,jpeg,png|max:4096'
                ]);
                $txtImagen = time().'.'.$request->foto->extension();  
                Portafolio::create([
                    'id_user' => Auth::user()->id_user,
                    'nombre' => $request->nombre,
                    'foto' => $txtImagen
                ]);
                $request->foto->move(public_path('uploads/img_portafolios'), $txtImagen);
            }
            return back()->withSuccess('Se guardaron los cambios');
        } catch (Exception $e) {
            return back()->withErrors('Ocurrio un error: '.$e->getMessage());
        }
    }
}
