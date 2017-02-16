<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Reuniao;
use App\User;
class ReunioesController extends Controller
{
    public function index(){
    	$reunioes = Reuniao::where('user_id', Auth::user()->id)
                    ->get();
    	return view('users.reunioes.index')->with([
    		"titulo" => "Controle de reuniões", 
    		"reunioes" => $reunioes,
            "botao" => ["nome" => 'Adicionar reunião',"rota" => "users.reunioes.create"]
            ]);
    }

    public function create(){

        return view('users.reunioes.create')->with([
            "titulo" => "Adicionando reunião",
            'user_id' => Auth::user()->id
            ]);
    }

    public function delete($id){
        $reuniao = Reuniao::destroy($id);
        return redirect(route("users.reunioes.index"));
    }

    public function updateParticipantes(Request $request){
        $reuniao = Reuniao::find($request->id);
        $situacoes = [$reuniao->id => 'on'];
        if($request->situacoes != null){
            $situacoes = $request->situacoes;
            $situacoes[$reuniao->user_id] = 'on';
        }
        $situacoes = array_keys($situacoes);
        $reuniao->participantes()->sync($situacoes);
        return redirect(route('users.reunioes.participantes', ['id' => $reuniao->id]));
    }

    public function participantes($id){
        $reuniao = Reuniao::find($id);
        $usuarios = User::where('role_id', 2)->with('profissao')->get();
        $participantes = $reuniao->participantes;
        $situacoes = [];
        foreach ($participantes as $participante) {
            array_push($situacoes, $participante->id);
        }
 
        return view('users.reunioes.participantes')->with([
            "reuniao" => $reuniao,
            "botao" => ["nome" => 'Voltar para reuniões',"rota" => "users.reunioes.index"],
            "usuarios" => $usuarios,
            'situacoes' => $situacoes,
            'titulo' => 'Participantes da reuniao',
            ]);
    }

    public function iniciar($id){
        $reuniao = Reuniao::find($id);
        if($reuniao->status == 0){
            $reuniao->status = -1;
            $reuniao->save();
        }
        $participantes = $reuniao->participantes;
        return view('users.reunioes.iniciar')->with([
            "reuniao" => $reuniao,
            'participantes' => $participantes,
    		"botao" => ["nome" => 'Voltar para reuniões',"rota" => "users.reunioes.index"],
            'titulo' => 'Reunião em andamento'
            ]);

    }

    public function marcarPresenca($reuniao_id, $user_id){
        $reuniao = Reuniao::find($reuniao_id);
        $reuniao->participantes()->updateExistingPivot($user_id, ['status' => 1]);
        return redirect(route('users.reunioes.iniciar', ['id' => $reuniao_id]));
    }
    public function encerrar($reuniao_id){
        $reuniao = Reuniao::find($reuniao_id);
        $reuniao->status = 1;
        $reuniao->save();
        return redirect(route('users.reunioes.index'));
    }

    public function save(Request $request){
        $dados = $request->all();
        $reuniao = Reuniao::create($dados);
     	return redirect(route("users.reunioes.index"));
    }
}
