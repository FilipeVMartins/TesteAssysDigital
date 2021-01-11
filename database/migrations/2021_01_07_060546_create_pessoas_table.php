<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->text('nome')->unique(); //campos 'nome' e 'cpf' assumidos como únicos para criar índices.
            $table->char('cpf', 14)->unique(); 
            $table->char('cep', 20);
            $table->char('uf', 45);
            $table->text('cidade');
            $table->text('bairro');
            $table->text('logradouro');
            $table->text('numero');
            $table->text('complemento')->nullable();
            $table->char('telefone', 45);
            $table->char('telefone2', 45);
            $table->char('nacionalidade', 45);
            $table->date('data_nascimento');
            $table->foreignId('grupo_id')->index()->constrained('grupos'); //assumido como nullable pois não está previsto no cadastro inicial de pessoas? ou o cadastro de pessoas será feito apenas dentro de um objeto grupo? R: Segunda opção escolhida.
            //Na documentação, o nome da tabela é 'grupos' porém o nome do campo estrangeiro de 'pessoas' é 'grupo_id', por não seguir a convenção do laravel para o uso do 'constrained()' (método para uma sintaxe abreviada), é necessário explicitar o nome da tabela destino como parâmetro.              "If your table name does not match Laravel's conventions, you may specify the table name by passing it as an argument to the constrained method:"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
