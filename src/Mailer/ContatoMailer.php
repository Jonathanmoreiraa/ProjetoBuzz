<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * Contato mailer.
 */
class ContatoMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'Contato';
    public function newMessageContato($msgContato){
        $this->setTo($msgContato->email)
        ->setProfile('envemail') //colocar as credenciais no config->app->linha 221.
        ->setEmailFormat('html')
        ->setTemplate('contato_cliente')
        ->setLayout('contato')
        ->setViewVars(['name' => $msgContato->name, 'subject'=>$msgContato->subject, 'message'=>$msgContato->message]) //envia as informações escolhidas para o viewVars
        ->setSubject(sprintf('Mensagem de contato recebido com sucesso'));
    }
    public function newMessageContatoAdm($msgContato){
        $this->setTo($msgContato->emailAdm)
        ->setProfile('envemail') //colocar as credenciais no config->app->linha 221.
        ->setEmailFormat('html')
        ->setTemplate('contato_adm')
        ->setLayout('contato')
        ->setViewVars(['name' => $msgContato->name, 'email'=>$msgContato->email,'subject'=>$msgContato->subject, 'message'=>$msgContato->message]) //envia as informações escolhidas para o viewVars
        ->setSubject(sprintf('Mensagem de contato recebido com sucesso'));
    }
}
