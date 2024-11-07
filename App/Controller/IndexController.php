<?php

namespace App\Controller;


class IndexController
{
    public function __invoke()
    {
        view('index', template: 'guest');
    }
}
