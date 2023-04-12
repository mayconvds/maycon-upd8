<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    public function listCities()
    {
        $data = [];

        $states = DB::table("states")->orderBy("name")->get();

        if (empty($states)) {
            $data["success"] = false;
            $data["message"] = "Não foi encontrado nenhum estado.";
            echo json_encode($data);
            return;
        }

        $cities = DB::table("cities")->orderBy("name")->get();

        if (empty($cities)) {
            $data["success"] = false;
            $data["message"] = "Não foi encontrado nenhuma cidade.";
            echo json_encode($data);
            return;
        }

        $data["success"] = true;
        $data["cities"] = $cities;
        $data["states"] = $states;
        echo json_encode($data);
    }
}
