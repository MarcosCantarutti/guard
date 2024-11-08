<?php

namespace App\Controller\Contatos;

use App\Models\Contato;
use Core\Validacao;

class AtualizarController
{
    public function __invoke()
    {
        $possoAtualizarOContato = session()->get('mostrar');


        $validacao = Validacao::validar(
            array_merge([
                'nome' => ['required'],
                'observacao' => ['required'],
                'telefone' => ['required'],
                'email' => ['required'],
                'id' => ['required']
            ], $possoAtualizarOContato ? ['contato' => ['required']] : []),
            request()->all()
        );

        if ($validacao->naoPassou()) {
            // se deu errado
            return redirect('/contatos?id=' . request()->post('id'));
        }


        $dir = "images/";
        $name = md5(rand());
        $extension = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $imagem = "$dir$name.$extension";

        move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__ . '/../public/' . $imagem);

        Contato::update(request()->post('id'), request()->post('nome'), request()->post('observacao'), request()->post('telefone'), request()->post('email'), $imagem);

        flash()->push('mensagem', "Registro atualizado com sucesso!!");
        return redirect('/contatos?id=' . request()->post('id'));
    }
}
