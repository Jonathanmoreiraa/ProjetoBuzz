<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'User';

    //Função para enviar email ao se cadastrar 
    public function cadastroUser($user)
    {
        //Adicionar o enviar email
        $this->setTo($user->email)
        ->setProfile('envemail') //configuração pré-definida, no config/app
        ->setEmailFormat('html') //formato do email
        ->setTemplate('welcome') //usa o template com o email, nesse caso o welcome(nome do arquivo)
        ->setLayout('user') //o nome do layou que está em layout/email/nome
        ->setViewVars(['nome'=>$user->name, 'cod_val_email' => $user->cod_val_email, 'host-name'=>$user->host_name]) //enviando valores para o documento
        ->setSubject(sprintf('Bem vindo'));
    
    }
    public function recuperarSenha($user)
    {
        $this->setTo($user->email)
        ->setProfile('envemail')
        ->setEmailFormat('html')
        ->setTemplate('recuperar_senha')
        ->setLayout('user')
        ->setViewVars(['nome'=>$user->name,'username'=>$user->username,'recuperar_senha' => $user->recuperar_senha, 'host-name'=>$user->host_name])
        ->setSubject(sprintf('Recuperar senha'));
    }
}
