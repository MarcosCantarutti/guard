<?php

namespace App\Controller\Notas;

use App\Models\Nota;

class IndexController
{
    public function __invoke()
    {
        $notas = Nota::all(filter: request()->get('pesquisar'));

        if (!$notasSelecionada =  $this->getNotaSelecionada($notas)) {
            return view('notas/nao-encontrada');
        }

        return view(
            'notas/index',
            [
                'notas' => $notas,
                'notaSelecionada' => $notasSelecionada
            ]
        );
    }


    private function getNotaSelecionada($notas)
    {
        $id =  request()->get('id', (sizeof($notas) > 0 ? $notas[0]->id : null));
        $filtro = array_filter($notas, fn($n) => $n->id == $id);
        return array_pop($filtro);
    }
}
