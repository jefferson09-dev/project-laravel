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

    // public function create(Request $request)
    // {
        
    //     UsersModel::create([
    //         'email' => $request->usermail,
    //         'senhas' => $request->userpasse
    //     ]);

    //     Mail::raw('Obrigado por se registrar em o nosso site!', function ($message) use ($request) {
    //         $message->to($request->usermail)
    //                 ->subject('Registro de Usuário');
    //     });
    //     return $request->all();
    //  // "usermail":"jeffersonn.rodrigo.09@gmail.com","userpasse":"1234","userpasseconfirma":"1234"
    // }

    //--- teste de validação de email e senha

    public function create(Request $request)
    {
        // 1️⃣ Validação dos campos
        $request->validate(
            [
                'usermail'  => 'required|email|unique:users,email',
                'userpasse' => 'required|min:3'
            ],
            [
                'usermail.required'  => 'O e-mail é obrigatório',
                'usermail.email'     => 'Informe um e-mail válido',
                'usermail.unique'    => 'Este e-mail já está cadastrado',
                'userpasse.required' => 'A senha é obrigatória',
                'userpasse.min'      => 'A senha deve ter no mínimo 6 caracteres'
            ]
        );

        // 2️⃣ Criação do usuário
        UsersModel::create([
            'email'  => $request->usermail,
            'senhas' => bcrypt($request->userpasse) // NUNCA salvar senha sem hash
        ]);

        // 3️⃣ Envio de e-mail
        Mail::raw('Obrigado por se registrar em nosso site!', function ($message) use ($request) {
            $message->to($request->usermail)
                    ->subject('Registro de Usuário');
        });

        // 4️⃣ Retorno com sucesso
        return redirect()->back()->with('success', 'Usuário cadastrado com sucesso!');
    }
}



