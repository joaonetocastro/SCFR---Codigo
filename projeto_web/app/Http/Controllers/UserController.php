<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use App\User;
use App\Profissao;
class UserController extends Controller
{
    public function control(){
        $users = User::get();
        return view('users.index')->with([
            "titulo" => "Bem vindo", 
            ]);
    }

    public function index(){
    	$users = User::get();
    	return view('admin.users.index')->with([
    		"titulo" => "Controle de usuários", 
    		"users" => $users,
    		"botao" => ["nome" => 'Adicionar usuário',"rota" => "admin.users.create"]
    		]);
    }

    public function create(){
    	$profissoes = Profissao::pluck("nome", 'id');
    	return view('admin.users.create')->with([
    		"titulo" => "Adicionando usuário",
    		"profissoes" => $profissoes
    		// "botao" => ["nome" => 'Adicionar usuário',"rota" => "admin.users.add"]
    		]);
    }
    public function trocar($id){
        $user = User::find($id);
        $user->situacao = $user->situacao == 1 ? 0 : 1;
        $user->update();
        return redirect(route('admin.users.index')); 
    }
    public function save(Request $request){
        $dados = $request->all();
        $dados['password'] = Hash::make($dados['password']);
        $user = User::create($dados);
     	return redirect(route("admin.users.index"));
    }
}