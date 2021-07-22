<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Exception;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show_form_register(){
        return view('auth.register');
    }

    public function show_form_persona(){
        $id_persona = $this->get_id_persona();
        $persona = Persona::find($id_persona);
        return view('admin.admin_persona', compact("persona"));
    }

    private function get_id_persona(){
        $persona = User::join('personas', 'personas.id_persona', '=', 'users.id_persona')
            ->select('personas.id_persona')
            ->where('users.id_user', '=', Auth::user()->id_user)->take(1)->get();
        return $persona[0]->id_persona;
    }

    public function update(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'apellido' => 'required|string|min:3|max:100',
            'celular' => 'required|string|min:6|max:20',
            'biografia' => 'required|string|min:20|max:1000',
            'password' => 'nullable|string|confirmed|min:8|max:20'
        ]);
        if ($request->correo_oculto != $request->email) {
            $request->validate([
                'email' => 'required|email|unique:users,email|unique:personas,correo_electronico'
            ]);
        }
        $persona = Persona::find($request->id_persona);
        $user = User::where('id_persona', '=', $persona->id_persona)->take(1)->get();
        try {
            DB::beginTransaction();
            if ($request->hoja_vida != null) {
                $request->validate([
                    'hoja_vida' => 'required|file|mimes:pdf|max:15360'
                ]);
                $txtHojaVida = $request->email.'.'.time().'.'.$request->hoja_vida->extension();
                $persona->update([
                    'hoja_vida' => $txtHojaVida
                ]);
                $request->hoja_vida->move(public_path('uploads/files/hojas_vida_users'), $txtHojaVida);
            }
            if ($request->imagen != null) {
                $request->validate([
                    'imagen' => 'required|image|mimes:jpg,png,jpeg|max:4096'
                ]);
                $txtImagen = $request->email.'.'.time().'.'.$request->imagen->extension();  
                $persona->update([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'celular' => $request->celular,
                    'correo_electronico' => $request->email,
                    'foto' => $txtImagen,
                    'biografia' => $request->biografia
                ]);
                if ($request->password != null) {
                    $user[0]->update([
                        'email' => $request->email,
                        'password' => Hash::make($request->password)
                    ]);
                }else{
                    $user[0]->update([
                        'email' => $request->email,
                    ]);
                }
                $request->imagen->move(public_path('uploads/img_users'), $txtImagen);
            }else{
                $persona->update([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'celular' => $request->celular,
                    'correo_electronico' => $request->email,
                    'biografia' => $request->biografia
                ]);
                if ($request->password != null) {
                    $user[0]->update([
                        'email' => $request->email,
                        'password' => Hash::make($request->password)
                    ]);
                }else{
                    $user[0]->update([
                        'email' => $request->email,
                    ]);
                }
            }
            DB::commit();
            return back()->withSuccess('Se creo con éxito.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors('Ocurrio un error inesperado: '.$e->getMessage());
        }
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'apellido' => 'required|string|min:3|max:100',
            'celular' => 'required|string|min:6|max:20',
            'biografia' => 'required|string|min:20|max:1000',
            'email' => 'required|email|unique:users,email|unique:personas,correo_electronico',
            'password' => 'required|string|confirmed|min:8|max:20'
        ]);
        try {
            DB::beginTransaction();
            if ($request->imagen != null) {
                $request->validate([
                    'imagen' => 'required|image|mimes:jpg,png,jpeg|max:4096'
                ]);
                $txtImagen = $request->email.'.'.time().'.'.$request->imagen->extension();  
                $persona = Persona::create([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'celular' => $request->celular,
                    'correo_electronico' => $request->email,
                    'foto' => $txtImagen,
                    'biografia' => $request->biografia
                ]);
                User::create([
                    'id_persona' => $persona->id_persona,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
                $request->imagen->move(public_path('uploads/img_users'), $txtImagen);
            }else{
                $persona = Persona::create([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'celular' => $request->celular,
                    'correo_electronico' => $request->email,
                    'foto' => 'usuario_defecto.png',
                    'biografia' => $request->biografia
                ]);
                User::create([
                    'id_persona' => $persona->id_persona,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
            }
            DB::commit();
            return redirect()->route('login')->withSuccess('Se creo con éxito.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('login')->withErrors('Ocurrio un error inesperado: '.$e->getMessage());
        }
    }
}
