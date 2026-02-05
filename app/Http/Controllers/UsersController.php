<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;


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
        UsersModel::create([
            'email' => $request->usermail,
            'senhas' => $request->userpasse
        ]);

        Mail::raw('Obrigado por se registrar em o nosso site!', function ($message) use ($request) {
            $message->to($request->usermail)
                    ->subject('Registro de Usuário');
        });
        return $request->all();
     // "usermail":"jeffersonn.rodrigo.09@gmail.com","userpasse":"1234","userpasseconfirma":"1234"
    }
}



