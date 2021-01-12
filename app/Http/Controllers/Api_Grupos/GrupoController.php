<?php

namespace App\Http\Controllers\Api_Grupos;

use App\Models\Grupo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\GrupoResource;
use Exception;

class GrupoController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest');
    }



    public function index(Request $request) //adquirir qtd paginação no corpo via get
    {
        //$request->qtdpaginate; quantidade de registros indexada por paginação
        $data = ['data' => GrupoResource::collection(Grupo::where('nome', 'LIKE' , '%'.$request->nome.'%')->paginate($request->qtdpaginate))];
        
        return response()->json($data);
    }

// Grupo::where('nome', 'LIKE' , '%'.$request->qtdindex.'%')->paginate($qtdpaginate)

    public function show($id)
    {
        $data = ['data' => new GrupoResource(Grupo::findOrFail($id))];
        
        return response()->json($data);
    }



    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nome' => ['required', 'max:255', 'unique:grupos'],
                'descricao' => ['required', 'max:65535'],
            ]);

            if ($validator->fails()) {
                $resposta = ['data' => ['errors'=>$validator->errors()]];
                return response()->json($resposta);
            }

            $novogrupo = $request->all();
            Grupo::create($novogrupo);
            
            $novogrupo = Grupo::where('nome', '=', $request->nome)->firstOrFail();

            $resposta = ['data' => ['msg' => 'Grupo criado!', 'novogrupo' => new GrupoResource($novogrupo) ]];
            return response()->json($resposta, 201); //http status code 201 para recurso criado, é enviado fora do json.

        } catch (Exception $e){
            if (config('app.debug')){
                $resposta = ['data' => ['msg' => $e->getMessage()]]; //para a documentação da api também poderia adicionar campo código para as mensagens de erro internas.
                return response()->json($resposta, 422);
            } else {
                $resposta = ['data' => ['msg' => 'Erro ao criar o Grupo.']];
                return response()->json($resposta, 422);
            }
        }

    }



    public function update(Request $request)
    {
        try {
            //obrigatório ter o id para iniciar o objeto antes do Validator, pois alguns dados do objeto atual serão comparados aos novos dados para determinar validações dos campos únicos e editáveis.
            $request->validate([
                'id' => 'required|integer',
            ]);
            $editgrupo = Grupo::findOrFail($request->id);
            $validator = Validator::make($request->all(), [
                'nome' => ['exclude_if:nome,'.$editgrupo->nome,'required', 'max:255', 'unique:grupos'],
                'descricao' => ['required', 'max:65535'],
            ]);

            if ($validator->fails()) {
                $resposta = ['data' => ['errors'=>$validator->errors()]];
                return response()->json($resposta);
            }

            $editgrupo->update($request->all());

            $resposta = ['data' => ['msg' => 'Grupo editado!']];
            return response()->json($resposta, 201); //http status code 201 para recurso criado, é enviado fora do json.

        } catch (Exception $e){
            if (config('app.debug')){
                $resposta = ['data' => ['msg' => $e->getMessage()]];
                return response()->json($resposta, 422);
            } else {
                $resposta = ['data' => ['msg' => 'Erro ao editar o Grupo.']];
                return response()->json($resposta, 422);
            }
        }
    }



    public function delete(Request $request)
    {
        //dd ($request->id);
        try {
            $deletegrupo = Grupo::findOrFail($request->id); //alternativamente ao OrFail poderia-se criar if null para retornar um json, evitando a resposta do model.
            $deletegrupo->delete();

            $resposta = ['data' => ['msg' => 'Grupo ' . $deletegrupo->nome . ' excluido!']]; //ver dps codificação para o 'í'.
            return response()->json($resposta, 201); //http status code 201 para recurso criado, é enviado fora do json.

        } catch (Exception $e){
            if (config('app.debug')){
                $resposta = ['data' => ['msg' => $e->getMessage()]];
                return response()->json($resposta, 422);
            } else {
                $resposta = ['data' => ['msg' => 'Erro ao excluir o Grupo.']];
                return response()->json($resposta, 422);
            }
        }

    }











    

}
