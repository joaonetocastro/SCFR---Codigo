<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Reuniao;
class ReunioesController extends Controller
{
    public function index(){
    	$reunioes = Reuniao::where('user_id', Auth::user()->id)
                    ->get();
    	return view('users.reunioes.index')->with([
    		"titulo" => "Controle de usuários", 
    		"reunioes" => $reunioes,
    		"botao" => ["nome" => 'Adicionar reunião',"rota" => "users.reunioes.create"]
    		]);
    }

    public function create(){

    	return view('users.reunioes.create')->with([
    		"titulo" => "Adicionando reunião",
    		'user_id' => Auth::user()->id
    		// "botao" => ["nome" => 'Adicionar usuário',"rota" => "admin.users.add"]
    		]);
    }

    public function adicionarParticipantes($id){
        return 'lol';
    }

    public function delete($id){
    	$reuniao = Reuniao::destroy($id);
     	return redirect(route("users.reunioes.index"));
    }

    public function participantes($id){
        $reuniao = Reuniao::find($id);
        $participantes = $reuniao->participantes;
        return view('users.reunioes.participantes')->with([
            "reuniao" => $reuniao,
            "participantes" => $participantes,
            "botao" => ["nome" => 'Adicionar participantes',"rota" => "users.reunioes.participantes.add", 'parms' = '["id" => "' + $reuniao->id + '"]']
            ]);
    }

    public function save(Request $request){
        $dados = $request->all();
        $reuniao = Reuniao::create($dados);
     	return redirect(route("users.reunioes.index"));
    }
}
