<?php

namespace App\Controller;

class LogoutController
{
    public function __invoke()
    {

        session_destroy();
        return redirect('/login');
    }
}
