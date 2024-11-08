<?php

namespace App\Controller\Contatos;

use App\Models\Contato;
use Core\Validacao;

class CriarController
{
    public function index()
    {
        return view('contatos/criar');
    }
    public function store()
    {
        $validacao = Validacao::validar([
            'nome' => ['required'],
            'observacao' => ['required'],
            'telefone' => ['required'],
            'email' => ['required'],
        ], request()->all());

        if ($validacao->naoPassou()) {
            // se deu errado
            return  view('contatos/criar');
        }


        $dir = "images/";
        $name = md5(rand());
        $extension = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $imagem = "$dir$name.$extension";

        move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__ . '/../public/' . $imagem);

        Contato::create(auth()->id, request()->post('nome'), request()->post('observacao'), request()->post('telefone'), request()->post('email'), $imagem);

        flash()->push('mensagem', 'Contato criado com sucesso!');
        return redirect('/contatos');
    }
}
