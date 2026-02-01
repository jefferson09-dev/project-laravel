<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;

class UsersController extends Controller
{
    public function index()
    {
        return ["user" => ["User1", "User2", "User3"]];
    }

    public function showStatus($user, $id)
    {
        return 'você quer ver o ' .$users . ' de id ' .$id;
    }

    public function create(Request $request)
    {
        if($request->userpasse != $request->userpasseconfirma) {
            return "As senhas não coincidem!";
        }

        UsersModel::create([
            'email' => $request->usermail,
            'senhas' => $request->userpasse
        ]);
        return $request->all();
     // "usermail":"jeffersonn.rodrigo.09@gmail.com","userpasse":"1234","userpasseconfirma":"1234"
    }
}
