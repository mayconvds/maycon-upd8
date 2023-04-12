<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    public function search(Request $request)
    {

        $users = User::where("id", ">=", 1)->orderBy("name");

        if (!empty($request->cpf)) {
            $users->where("cpf", "=", $request->cpf);
        }

        if (!empty($request->name)) {
            $users->where("name", "like", "%{$request->name}%");
        }

        if (!empty($request->date_of_birth)) {
            $users->where("date_of_birth", "=", $request->date_of_birth);
        }

//        if (!empty($request->sex)) {
//            $users->where("sex", "=", $request->sex);
//        }

        if (!empty($request->state_id) && $request->state_id != "all") {
            $users->where("state_id", "=", $request->state_id);
        }

        if (!empty($request->city_id) && $request->city_id != "all") {
            $users->where("city_id", "=", $request->city_id);
        }

        $search = $users->paginate(4);
        return response()->json($search);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            \App\Models\User::create($request->all());
            return response()->json(["Usuário criado com sucesso!"]);
        } catch (\Exception $exception) {
            return response()->json($exception);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update($request->all());
            return response()->json(["Usuário Editado com sucesso!"]);
        }catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(["Usuário Deletado com sucesso!"]);
        }catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
