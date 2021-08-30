<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email; //usado para funcionar o email
use Cake\Mailer\MailerAwareTrait; //usar o mailer
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Security;

/**
 * Contato Controller
 *
 * @property \App\Model\Table\UsersTable $SobreEmpresa
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContatoController extends AppController
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
    use MailerAwareTrait; //pois estará usando o mailer
    public function index()
    {
        $contactMessagesTable = TableRegistry::get('ContactMessages');
        $contactMessage = $contactMessagesTable->newEntity();

        $mediasSocialTable = TableRegistry::get('MediasSocials');
        $mediasSocials = $mediasSocialTable->getListRedes();
        if($this->request->is('post')){
            $contactMessage = $contactMessagesTable->patchEntity($contactMessage,$this->request->getData()); //patchEntity recebe os dados do BD
            if($contactMessagesTable->save($contactMessage)){

                /*$this->getMailer('Contato')->send('newMessageContato',$ContactMessage);
                  A linha acima vai enviar um email de confirmação de envio de mensagem, assim que tiver um servidor, descomentar a linha*/
                
                  /* $contactMessage->emailAdm = 'email@email.com'; //deixa o email de adm fixo.
                    $this->getMailer('Contato')->send('newMessageContatoAdm',$contactMessage);
                    A linha acima vai enviar um email de confirmação de envio de mensagem para o administrador, assim que tiver um servidor, descomentar a linha
                  */

                    $this->Flash->success(__('Mensagem de contato enviada com sucesso!'));
                return $this->redirect(['controller'=>'Contato','action' => 'index']);
            }else{
                $this->Flash->danger(__('Erro enviar a mensagem!'));
            }
        }
        $this->set(compact('contactMessage', 'mediasSocials'));
    }
}