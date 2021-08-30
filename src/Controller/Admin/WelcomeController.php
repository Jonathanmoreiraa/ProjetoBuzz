<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class WelcomeController extends AppController{
//faz a autentificação do login do usuário
    public function index()
    {
        $user = $this->Auth->user();
        $this->set(compact('user'));
    }

    }