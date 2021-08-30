<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email; //usado para funcionar o email
use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\TableRegistry;
use Cake\Database\Expression\QueryExpression;
use Cake\Routing\Router;
use Cake\Utility\Security;

/**
 * Passa um artigo só, não varios igual o articles.
 */
class ArtigoController extends AppController
{
    /**
     * Permitir que os usuários acessem uma determinada tela sem precisar estar logado.
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['view']); //recebe o nome da tela a ser acessada sem login
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function view($slug = null)
    {   
        $articleTable = TableRegistry::get('Articles');//pega os dados databela articles
        $article = $articleTable->getVerArtigo($slug);
        if($article){
            $articleAnt = $articleTable->getArtigoAnt($article->id);
            $articleProx = $articleTable->getArtigoProx($article->id);
            //Acrescentar um acesso a quantidade de acesso, toda vez que alguem acessar.
            $expression = new QueryExpression('access_quantity = access_quantity + 1');
            $articleTable->updateAll([$expression], ['Articles.id' => $article->id]);

            $this->set(compact('articleAnt', 'articleProx'));
        }
        $articleUlts = $articleTable->getArtigoUlts();
        $articleDestaq = $articleTable->getArtigoDestaq();

        $autorsSobTable = TableRegistry::get('AutorsSobs');
        $autorsSob = $autorsSobTable->getVerSobAutor();

        $mediasSocialTable = TableRegistry::get('MediasSocials');
        $mediasSocials = $mediasSocialTable->getListRedes();


        $this->set(compact('article', 'articleUlts', 'articleDestaq', 'autorsSob', 'mediasSocials'));
    }
    
}