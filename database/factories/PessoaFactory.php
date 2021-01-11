<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PessoaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pessoa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $UF = [
            'AC',
            'AL',
            'AP',
            'AM',
            'BA',
            'CE',
            'DF',
            'ES',
            'GO',
            'MA',
            'MT',
            'MS',
            'MG',
            'PA',
            'PB',
            'PR',
            'PE',
            'PI',
            'RJ',
            'RN',
            'RS',
            'RO',
            'RR',
            'SC',
            'SP',
            'SE',
            'TO'
        ];

        return [
            'nome' => $this->faker->unique()->name,
            'cpf' => $this->faker->unique()->numberBetween(10000000000, 99999999999),
            'cep' => $this->faker->numberBetween(10000000, 99999999),
            'uf' => $UF[array_rand($UF)], //$this->faker->stateAbbr(),
            'cidade' => $this->faker->city(),
            'bairro' => $this->faker->word(),
            'logradouro' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'complemento' => $this->faker->word(),
            'telefone' => $this->faker->numberBetween(10000000000, 99999999999),
            'telefone2' => $this->faker->numberBetween(10000000000, 99999999999),
            'nacionalidade' => $this->faker->word(),
            'data_nascimento' => $this->faker->date(),
            'grupo_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
