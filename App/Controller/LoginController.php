<?php

namespace App\Controller;

use Core\Database;
use Core\Validacao;
use App\Models\Usuario;

class LoginController
{
    public function index()
    {
        return view('login', template: 'guest');
    }

    public function login()
    {


        $email    = request()->post('email');
        $password = request()->post('password');

        $validacao = Validacao::validar([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], $_POST);

        if ($validacao->naoPassou()) {
            // se deu errado
            return  view('login', template: 'guest');
        }

        // se deu certo
        $database = new Database(config('database'));

        $usuario  = $database->query(
            query: "select * from usuarios where email = :email",
            class: Usuario::class,
            params: ['email' => $email]
        )->fetch();

        if (!$usuario && password_verify($password, $usuario->password)) {
            flash()->push('validacoes', ['email' => ['Usuario ou senha estão incorretos!']]);
            return view('login', template: 'guest');
        }

        $_SESSION['auth'] = $usuario;
        flash()->push('mensagem', "Seja bem vindo " . $usuario->nome . "!");
        return redirect('/notas');
    }
}
