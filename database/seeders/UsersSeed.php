<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeed extends Seeder
{
    private $users = [
        22 => [
            "name" => "Diogo Tiago da Paz",
            "cpf" => "382.505.761-52",
            "sex" => "1",
            "date_of_birth" => "2002-04-06",
            "street" => "Rua Doutor Pedro Marcelo de Oliveira",
            "state_id" => 27,
            "city_id" => 2704302
        ],
        23 => [
            "name" => "Caleb Heitor Theo Barbosa",
            "cpf" => "774.532.862-47",
            "sex" => "1",
            "date_of_birth" => "1955-01-21",
            "street" => "Rua Alberto Noel de Paula Filho",
            "state_id" => 41,
            "city_id" => 4106902
        ],
        24 => [
            "name" => "Kaique Daniel Araújo",
            "cpf" => "593.568.440-38",
            "sex" => "1",
            "date_of_birth" => "1955-01-21",
            "street" => "Rua Soldado Valeriano de Almeida",
            "state_id" => 31,
            "city_id" => 3106200
        ],
        26 => [
            "name" => "Luna Helena Giovana Martins",
            "cpf" => "434.686.953-06",
            "sex" => "2",
            "date_of_birth" => "1953-04-12",
            "street" => "Acesso Treze",
            "state_id" => 31,
            "city_id" => 3106200
        ],
        27 => [
            "name" => "Olivia Cecília Barbosa",
            "cpf" => "077.743.320-65",
            "sex" => "2",
            "date_of_birth" => "1953-04-12",
            "street" => "Rua Antônio Carneiro Cézar Menezes",
            "state_id" => 26,
            "city_id" => 2604007
        ],
        28 => [
            "name" => "Yuri Gustavo Ian Sales",
            "cpf" => "062.066.532-77",
            "sex" => "1",
            "date_of_birth" => "1964-01-19",
            "street" => "Rua Trinta e Um de Março 7",
            "state_id" => 41,
            "city_id" => 5107354
        ],
        29 => [
            "name" => "Isis Eduarda Alana de Paula",
            "cpf" => "358.097.189-14",
            "sex" => "2",
            "date_of_birth" => "1964-01-19",
            "street" => "Rua Assembléia",
            "state_id" => 21,
            "city_id" => 2105302
        ],
        31 => [
            "name" => "Maycon Vieira da Silva",
            "cpf" => "115.917.107-66",
            "sex" => "1",
            "date_of_birth" => "1992-05-20",
            "street" => "Estrada Virgem Santa",
            "state_id" => 33,
            "city_id" => 3302403
        ],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as $uId => $user) {
            DB::table("users")->insert([
                "name" =>  $user["name"],
                "cpf" => $user["cpf"],
                "sex" => $user["sex"],
                "date_of_birth" => $user["date_of_birth"],
                "street" => $user["street"],
                "state_id" => $user["state_id"],
                "city_id" => $user["city_id"],
            ]);
        }
    }
}
