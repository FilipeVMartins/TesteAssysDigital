<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PessoaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cpf' => $this->cpf, 
            'cep' => $this->cep,
            'uf' => $this->uf,
            'cidade' => $this->cidade,
            'bairro' => $this->bairro,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'telefone' => $this->telefone,
            'telefone2' => $this->telefone2,
            'nacionalidade' => $this->nacionalidade,
            'data_nascimento' => $this->data_nascimento,
            'grupo_id'  => $this->grupo_id,
        ];


    }
}
