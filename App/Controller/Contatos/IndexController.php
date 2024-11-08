<?php


namespace App\Controller\Contatos;

use App\Models\Contato;
use Core\Validacao;

class IndexController
{
    public function __invoke()
    {
        $contatos = Contato::all(filter: request()->get('pesquisar'));

        if (!$contatoSelecionado =  $this->getContatoSelecionado($contatos)) {
            return view('contatos/nao-encontrada');
        }

        return view(
            'contatos/index',
            [
                'contatos' => $contatos,
                'contatoSelecionado' => $contatoSelecionado
            ]
        );
    }


    private function getContatoSelecionado($contatos)
    {
        $id =  request()->get('id', (sizeof($contatos) > 0 ? $contatos[0]->id : null));
        $filtro = array_filter($contatos, fn($n) => $n->id == $id);
        return array_pop($filtro);
    }
}
