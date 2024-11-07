<?php

namespace App\Controller\Notas;

use Core\Validacao;


class VisualizarController
{

    public function confirmar()
    {
        return view('notas/confirmar');
    }
    public function mostrar()
    {

        $validacao = Validacao::validar([
            'password' => ['required']
        ], request()->all());


        if ($validacao->naoPassou()) {
            return view('notas/confirmar');
        }

        if (!password_verify(request()->post('password'), auth()->password)) {
            flash()->push('validacoes', ['password' => ['senha está incorreta!']]);
            return view('notas/confirmar');
        }


        session()->set('mostrar', true);
        return redirect('/notas');
    }

    public function esconder()
    {
        session()->forget('mostrar');
        return redirect('/notas');
    }
}
