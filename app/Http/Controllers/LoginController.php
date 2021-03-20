<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function connect(){

        return view('connect.login');
    }

    public function register(){
        return view('connect.register');
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required',
            'last_name' => 'required',
            'email' => "required|email|unique:users,email",
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password',
        ];

        $messages = [
            'name.required' => 'El nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'El correo electrónico no es válido',
            'email.unique' => 'Ya existe un usuario registrado con esta dirección de correo',
            'password.required' => 'Por favor escriba una contraseña',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'cpassword.required' => 'Es necesario confirmar la contraseña',
            'cpassword.same' => 'Las contraseñas no coinciden',
        ];


        $request->validate($rules,$messages);

        $request->merge(['password' => bcrypt($request->password)]);

        $user = User::create($request->all());

        return redirect()->route('login')->with('info', 'Se ha registrado el usuario con éxito')->with('typealert','success');

    }

    public function checkLogin(Request $request){

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        $messages = [
            'email.required' => 'Por favor ingrese su correo electrónico',
            'email.email' => 'Por favor ingrese una dirección de correo válida',
            'password.required' => 'Por favor ingrese su contraseña',
            'password.min' => 'La contraseña ingresada debe ser de al menos 8 caracteres',
        ];

        $request->validate($rules,$messages);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {     
            
            return redirect()->route('home');

        }else{

            return back()->with('info','Correo electrónico o contraseña incorrecto')->with('typealert','danger');

        }

    }
    
    
    public function recover(){
        return view('connect.recover');
    }

}
