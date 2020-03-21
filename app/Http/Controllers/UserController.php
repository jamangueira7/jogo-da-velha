<?php

namespace App\Http\Controllers;

use App\Game;
use App\Play;
use App\Repositories\GameRepository;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function info()
    {
        $user = User::where('id', session('login')['id'])->first();
        return view('user.info', ['user' =>$user]);
    }//home

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        if($request->get('password') != $request->get('conf')){
            session()->flash('error', [
                'error' => true,
                'messages' => "Senhas não correspondem.",
            ]);
            return view('user.info', ['user' =>$user]);
        }

        $user->name = $request->get('name');
        if(!empty($request->get('password'))){
            $user->password = $request->get('password');
        }
        try {
            $user->save();

        }catch (\Exception $e){
            session()->flash('error', [
                'error' => true,
                'messages' => "Aconteceu algum erro ao atualizar usuario usuario.",
            ]);
            return view('sistem.home', []);
        }

        session()->flash('success', [
            'success' => true,
            'messages' => "Usuario Ataulizaydo",
        ]);

        return view('user.info', ['user' =>$user]);
    }//update

    public function criar(Request $request)
    {

        if($request->get('password') != $request->get('conf')){
            session()->flash('error', [
                'error' => true,
                'messages' => "Senhas não correspondem.",
            ]);
            return view('user.login', []);
        }

        if(empty($request->get('name'))){
            session()->flash('error', [
                'error' => true,
                'messages' => "Nome não pode ser vazio.",
            ]);
            return view('user.login', []);
        }

        if(empty($request->get('email'))){
            session()->flash('error', [
                'error' => true,
                'messages' => "E-mail não pode ser vazio.",
            ]);
            return view('user.login', []);
        }

        if(empty($request->get('cpf')) || strlen($request->get('cpf')) > 15){
            session()->flash('error', [
                'error' => true,
                'messages' => "CPF não pode ser vazio ou menor que 11 caracteres.",
            ]);
            return view('user.login', []);
        }
        if(empty($request->get('password'))){
            session()->flash('error', [
                'error' => true,
                'messages' => "Senha não pode ser vazia.",
            ]);
            return view('user.login', []);
        }

        $cpf = str_replace(['.','-'], '',$request->get('cpf'));
        $user = new User();
        $user->name = $request->get('name');
        $user->password = $request->get('password');
        $user->cpf = $cpf;
        $user->email = $request->get('email');


        try {
            $user->save();

        }catch (\Exception $e){
            session()->flash('error', [
                'error' => true,
                'messages' => "Aconteceu algum erro na criação do usuario.",
            ]);
            return view('user.login', []);
        }



        //Criar Usuario
        session()->put('login', [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
        ]);

        session()->flash('success', [
            'success' => true,
            'messages' => "Usuario criado",
        ]);

        return view('sistem.home', []);
    }//criar

    public function logar(Request $request)
    {
        if(empty($request->get('password')) ||  empty($request->get('email'))){
            session()->flash('error', [
                'error' => true,
                'messages' => "E-mail ou senha vazios.",
            ]);
            return view('user.login');
        }

        $user = User::where('email', $request->get('email'))->where('password', $request->get('password'))->first();

        if(empty($user)){
            session()->flash('error', [
                'error' => true,
                'messages' => "Dados incorretos.",
            ]);
            return view('user.login');
        }

        //Criar Usuario
        session()->put('login', [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
        ]);

        session()->flash('success', [
            'success' => true,
            'messages' => "Usuario {$user->name} logado.",
        ]);

        return view('sistem.home',[]);
    }//logar

    public function logout()
    {
        session()->forget('login');
        return view('user.login');
    }//logout

    public function login()
    {
        return view('user.login');
    }//login

    public function cadastro()
    {
        return view('user.cadastro');
    }//login



}//UserController
