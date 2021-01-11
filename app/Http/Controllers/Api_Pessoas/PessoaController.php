<?php

namespace App\Http\Controllers\Api_Pessoas;

use App\Models\Pessoa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PessoaResource;
use Exception;

class PessoaController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('guest');
    }



    public function index(Request $request) //adquirir tb paginação depois
    {
        //$request->qtdpaginate; quantidade de registros indexada por paginação
        // $request->grupo_id; grupo de pessoas ao qual será destinada a paginação
        $data = ['data' => PessoaResource::collection(Pessoa::where('nome', 'LIKE' , '%'.$request->nome.'%')->where('grupo_id', '=' , $request->grupo_id)->paginate($request->qtdpaginate))];


        return response()->json($data);
    }


    
    public function show($id)
    {
        $data = ['data' => new PessoaResource(Pessoa::findOrFail($id))];
        
        return response()->json($data);
    }



    public function store(Request $request) //pessoa_id será enviado no corpo
    {
        try {
            $validator = Validator::make($request->all(), [
                'nome' => ['required', 'unique:pessoas', 'max:65535', 'alpha'], //tamanho de text no MySql
                'cpf' => ['required', 'unique:pessoas', 'digits_between:1,14'], //era interessante reconhecer como numeric nos devidos campos para evitar entradas erradas por ¹erros de carregamento nas validações e máscaras do front-end ou ²requests propositais mal-intencionadas. O que poderia levar a problemas com futuros códigos SQL pela despadronização da base.
                'cep' => ['required', 'digits_between:1,20'],
                'uf' => ['required', 'max:45', 'alpha'],
                'cidade' => ['required', 'max:65535', 'alpha'],
                'bairro' => ['required', 'max:65535', 'alpha'],
                'logradouro' => ['required', 'max:65535'],
                'numero' => ['required','digits_between:1,65535'], 
                'complemento' => ['nullable', 'max:65535'],
                'telefone' => ['required', 'digits_between:1,45'],
                'telefone2' => ['required', 'digits_between:1,45'],
                'nacionalidade' => ['required', 'max:45', 'alpha'],
                'data_nascimento' => ['required', 'date'],
                'grupo_id' => ['required', 'integer'], //This validation rule does not verify that the input is of the "integer" variable type, only that the input is a string or numeric value that contains an integer.
            ]);

            if ($validator->fails()) {
                $resposta = ['data' => ['errors'=>$validator->errors()]];
                return response()->json($resposta);
            }

            $novapessoa = $request->all();
            Pessoa::create($novapessoa);

            $novapessoa = Pessoa::where('nome', '=', $request->nome)->firstOrFail();

            $resposta = ['data' => ['msg' => 'Pessoa criada!', 'novapessoa' => new PessoaResource($novapessoa) ]];
            return response()->json($resposta, 201); //http status code 201 para recurso criado.

        } catch (Exception $e){
            if (config('app.debug')){
                $resposta = ['data' => ['msg' => $e->getMessage()]];
                return response()->json($resposta, 422);
            } else {
                $resposta = ['data' => ['msg' => 'Erro ao criar a Pessoa.']];
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
            $editpessoa = Pessoa::findOrFail($request->id);
            $validator = Validator::make($request->all(), [
                'id' => ['required', 'integer'],
                'nome' => ['exclude_if:nome,'.$editpessoa->nome,'required', 'unique:pessoas', 'max:65535', 'alpha'], //tamanho de text no MySql
                'cpf' => ['exclude_if:cpf,'.$editpessoa->cpf,'required', 'unique:pessoas', 'digits_between:1,14'], //era interessante reconhecer como numeric nos devidos campos para evitar entradas erradas por ¹erros de carregamento nas validações e máscaras do front-end ou ²requests propositais mal-intencionadas de usuários. O que poderia levar a problemas com futuros códigos SQL pela despadronização da base.
                'cep' => ['required', 'digits_between:1,20'],
                'uf' => ['required', 'max:45', 'alpha'],
                'cidade' => ['required', 'max:65535', 'alpha'],
                'bairro' => ['required', 'max:65535', 'alpha'],
                'logradouro' => ['required', 'max:65535'],
                'numero' => ['required','digits_between:1,65535'], 
                'complemento' => ['nullable', 'max:65535'],
                'telefone' => ['required', 'digits_between:1,45'],
                'telefone2' => ['required', 'digits_between:1,45'],
                'nacionalidade' => ['required', 'max:45', 'alpha'],
                'data_nascimento' => ['required', 'date'],
                'grupo_id' => ['required', 'integer'], //This validation rule does not verify that the input is of the "integer" variable type, only that the input is a string or numeric value that contains an integer.
            ]);

            if ($validator->fails()) {
                $resposta = ['data' => ['errors'=>$validator->errors()]];
                return response()->json($resposta);
            }

            
            $editpessoa->update($request->all());

            $resposta = ['data' => ['msg' => 'Pessoa editada!']];
            return response()->json($resposta, 201); //http status code 201 para recurso criado.

        } catch (Exception $e){
            if (config('app.debug')){
                $resposta = ['data' => ['msg' => $e->getMessage()]];
                return response()->json($resposta, 422);
            } else {
                $resposta = ['data' => ['msg' => 'Erro ao editar a Pessoa.']];
                return response()->json($resposta, 422);
            }
        }
    }



    public function delete(Request $request)
    {
        try {
            $deletepessoa = Pessoa::findOrFail($request->id); //alternativamente ao OrFail poderia-se criar if null para retornar um json, evitando a resposta do model.
            $deletepessoa->delete();

            $resposta = ['data' => ['msg' => 'Pessoa ' . $deletepessoa->nome . ' excluida!']]; //ver dps codificação para o 'í'.
            return response()->json($resposta, 201); //http status code 201 para recurso criado, é enviado fora do json.

        } catch (Exception $e){
            if (config('app.debug')){
                $resposta = ['data' => ['msg' => $e->getMessage()]];
                return response()->json($resposta, 422);
            } else {
                $resposta = ['data' => ['msg' => 'Erro ao excluir a Pessoa.']];
                return response()->json($resposta, 422);
            }
        }

    }




}
