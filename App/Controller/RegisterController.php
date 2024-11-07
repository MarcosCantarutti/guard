<?php

namespace App\Controller;

use Core\Database;
use Core\Validacao;

class RegisterController
{
    public function index()
    {
        return view('registrar', template: 'guest');
    }

    public function register()
    {
        $database = new Database(config('database'));

        $validacao = Validacao::validar([
            'name' => ['required'],
            'email' => ['required', 'email', 'confirmed', 'unique:usuarios'],
            'password' => ['required', 'min:8', 'max:30', 'strong']
        ], request()->all());


        if ($validacao->naoPassou()) {
            return view('registrar', template: 'guest');
        }


        $database->query(
            query: "INSERT INTO USUARIOS (nome, email, password) values (:nome, :email, :password) ",
            params: [
                'nome' => request()->post('name'),
                'email' => request()->post('email'),
                'password' => password_hash(request()->post('password'), PASSWORD_DEFAULT),
            ]
        );

        flash()->push('mensagem', 'Registrado com sucesso!');
        return redirect('/login');
    }
}
