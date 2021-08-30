<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Carousel;
use Cake\Event\Event;
use Cake\Mailer\Email; //usado para funcionar o email
use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Blog
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogController extends AppController
{
    /**
     * Permitir que os usuários acessem uma determinada tela sem precisar estar logado.
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index']); //recebe o nome da tela a ser acessada sem login
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $articleTable = TableRegistry::get('Articles');
        $this->paginate = [
            'limit'=>6,
            'order'=> [
                'articles.id'=>'desc',
            ]
        ];

        $articles = $this->paginate('articles');

        $articleUlts = $articleTable->getArtigoUlts();
        $articleDestaq = $articleTable->getArtigoDestaq();

        $autorsSobTable = TableRegistry::get('AutorsSobs');
        $autorsSob = $autorsSobTable->getVerSobAutor();

        $mediasSocialTable = TableRegistry::get('MediasSocials');
        $mediasSocials = $mediasSocialTable->getListRedes();

        $this->set(compact('articles', 'articleUlts', 'articleDestaq', 'autorsSob', 'mediasSocials'));
    }
}