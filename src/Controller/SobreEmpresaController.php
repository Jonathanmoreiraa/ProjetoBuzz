<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email; //usado para funcionar o email
use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Security;

/**
 * SobreEmpresa Controller
 *
 * @property \App\Model\Table\UsersTable $SobreEmpresa
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SobreEmpresaController extends AppController
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
        $empSobTable = TableRegistry::get('EmpresasSobs'); //recebe os dados de sobre empresa
        $empSobs = $empSobTable->getListarEmpSob();//não precisa ter um parâmentro, pois trará todos os dados, exceto os inativos
        $mediasSocialTable = TableRegistry::get('MediasSocials');
        $mediasSocials = $mediasSocialTable->getListRedes();

        $this->set(compact('empSobs', 'mediasSocials'));//envia essa variável para a view
    }
}