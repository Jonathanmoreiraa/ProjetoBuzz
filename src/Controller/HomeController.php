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
 * @property \App\Model\Table\UsersTable $Home
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
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
        $carouselTable = TableRegistry::get('Carousels');
        $carousels = $carouselTable->getListarSlidesHome();

        $serviceTable = TableRegistry::get('Services');
        $services = $serviceTable->getListarServiceHome('1'); //usando o 1 para passar parâmentro

        $depositionTable = TableRegistry::get('Depositions');
        $depositions = $depositionTable->getListarDepositionsHome('1');

        $articlesTable = TableRegistry::get('Articles');
        $articles = $articlesTable->getListarArticlesHome();

        $mediasSocialTable = TableRegistry::get('MediasSocials');
        $mediasSocials = $mediasSocialTable->getListRedes();

        $this->set(compact('carousels','services', 'depositions', 'articles','mediasSocials'));
    }
}