<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @param string $cpf
     * @return bool
     */
    private function cpfValidator(string $cpf): bool
    {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        if (strlen($cpf) != 11) {
            return false;
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    public function listUser()
    {

        $user = User::where("id", "=", "1")->first();

        return view("listUser", [
            "user" => $user
        ]);
    }

    public function editUser($id)
    {
        $user = User::where("id", "=", $id)->first();
        return view("editUser", [
            "user" => $user
        ]);

    }

    public function register()
    {
        return view("register");
    }

}
