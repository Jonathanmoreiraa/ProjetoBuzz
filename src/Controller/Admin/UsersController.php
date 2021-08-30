<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email; //usado para funcionar o email
use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Permitir que os usuários acessem uma determinada tela sem precisar estar logado.
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['cadastrar', 'logout', 'confEmail', 'recuperarSenha', 'atualizarSenha']); //recebe o nome da tela a ser acessada sem login
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        /**cria a paginação, e limita o número de usuários por página */
        $this->paginate=['limit'=> 10];
        $users = $this->paginate($this->Users);//buscar todos no BD

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [//pesquisar por id
            'contain' => [],
        ]);

        $this->set('user', $user);
    }
    public function perfil()
    {
        $user_id = $this->Auth->user('id'); //recupera o id do suário logado, mas não atualiza para view
        $user = $this->Users->get($user_id);

        $this->set(compact('user'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $destino = WWW_ROOT. "files" . DS . "user" . DS . $user->id;                
                $this->Users->criarDiretorioImgRed($destino);
                $this->Flash->success(__('Cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);//retorna para a tela index
            }
            $this->Flash->danger(__('Erro ao cadastrar.'));
        }
        $this->set(compact('user'));
    }
    use MailerAwareTrait;
    public function cadastrar()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->cod_val_email = Security::hash($this->request->getData('password').$this->request->getData('email'), 'sha256', false); //criptografando o código de validação, usando o email e senha para validar
            if ($this->Users->save($user)) {
                $user->host_name = Router::fullBaseUrl().$this->request->getAttribute("webroot").$this->request->getParam("prefix");
                //$this->getMailer('User')->send('cadastroUser', $user);//usa o mailer 
                //A linha acima vai enviar um email de confirmação de cadastro, assim que tiver um servidor, descomentar a linha
                $destino = WWW_ROOT. "files" . DS . "user" . DS . $user->id;                
                $this->Users->criarDiretorioImgRed($destino);
                $this->Flash->successbutton(__('Cadastrado com sucesso.'));

                return $this->redirect(['controller'=>'Users', 'action' => 'login']);//retorna para a tela index
            }
            $this->Flash->error(__('Erro ao cadastrar o e-mail.'));
        }
        $this->set(compact('user'));
    }
    public function confEmail($cod_val_email = null)
    {
        $userTable = TableRegistry::get('Users');
        $confEmail = $userTable->getConfEmail($cod_val_email);
        if($confEmail){
            $user = $this->Users->newEntity();
            $user->id = $confEmail->id;
            $user->email_val = '1'; //significa que o e-mail está valido
            if($userTable->save($user)){
                $this->Flash->successbutton(__('O e-mail foi confirmado com sucesso!'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            else{
                $this->Flash->error(__('Erro: o e-mail não foi confirmado!'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        }else{
            $this->Flash->error(__('Erro: o e-mail não foi confirmado!'));

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }



    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Editado com sucesso.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'view', $id]);
            }
            $this->Flash->error(__('Erro ao editar.'));
        }
        $this->set(compact('user'));
    }

    public function alterarFotoUsuario($id = null)
    {   //recuperar os dados do usuário logado
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $imageAntiga = $user->image;
        if($this->request->is(['patch', 'post', 'put'])){
            $imgNome = $this->request->getData()['image']['name'];
            $imgTmp = $this->request->getData()['image']['tmp_name'];
            $user = $this->Users->newEntity();
            $user->id = $id;
            $user->image = $this->Users->slugUploadImgRed($this->request->getData()['image']['name']);
            $destino = WWW_ROOT.'files' . DS . 'user' . DS . $id . DS; //DS é igual o \\ no windows ou / no linux, é usado para se encaixar nos dois
            if(move_uploaded_file($imgTmp, $destino.$imgNome)){
                if($this->Users->save($user)){
                    if(($imageAntiga !== null) AND ($imageAntiga !== $user->image)){
                        unlink($destino.$imageAntiga); //o unlink vai excluir a última img,para isso basta mostrar o diretorio
                    }
                    $this->Flash->success(__('Foto editada com sucesso.'));
                    return $this->redirect(['controller'=>'Users', 'action'=>'view',$id]);
                } else{
                    $this->Flash->danger(__('Erro ao editar foto, tente de novo.'));
                }
            }
        }

        $this->set(compact('user'));

    }

    /**
     * Ação de login, autenticar
     */
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error(__("Nome de usuário e/ou senha incorretos!"));//mostra tela de erro
            }
        }
    }

    public function editPerfil(){
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                //atualiza a atuentificação
                $this->Flash->success(__('Perfil editado com sucesso.'));

                return $this->redirect(['controller'=>'Users','action' => 'perfil']);
            }
            $this->Flash->error(__('Erro ao editar o perfil.'));
        }
        $this->set(compact('user'));
    }
    public function editSenhaPerfil(){
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id, [
            'contain'=>[]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('Senha editada com sucesso.'));

                return $this->redirect(['controller'=>'Users','action' => 'index']);
            }
            $this->Flash->danger(__('Erro ao editar a senha.'));
        }
        $this->set(compact('user'));
    }

    public function recuperarSenha()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $userTable = TableRegistry::get('Users');
            $recupSenha = $userTable->getRecuperarSenha($this->request->getData()['email']);
            if($recupSenha){
                if($recupSenha->recuperar_senha == ""){
                    $user->id = $recupSenha->id;
                    $user->recuperar_senha = Security::hash($this->request->getData()['email'].$recupSenha->id . date("Y-m-d H:i:s") ,'sha256', false); //gera uma criptografia própria para cada usuário
                    $userTable->save($user);
                    $recupSenha->recuperar_senha = $user->recuperar_senha;
                    
                }
                $recupSenha->host_name = Router::fullBaseUrl().$this->request->getAttribute('webroot').$this->request->getParam('prefix');
                //$this->getMailer('User')->send('recuperarSenha', [$recupSenha]);
                $this->Flash->successbutton(__('E-mail encotrado com sucesso, retire o comentário do $this->getMailer.. para enviá-lo'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }else{
                $this->Flash->error(__('Erro ao enviar o e-mail!'));
            } 
        }
        $this->set(compact('user'));
    }
    public function atualizarSenha($recuperar_senha = null)
    {
        //verifica se algum usuário tem o código específico na coluna
        $userTable = TableRegistry::get('Users');
        $user = $userTable->getAtualizarSenha($recuperar_senha);
        
        if($user){
            $this->set(compact('user'));

            if($this->request->is(['patch', 'post', 'put'])){
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->recuperar_senha = null;
                if($this->Users->save($user)){
                    $this->Flash->successbutton(__('Senha alterada com sucesso!'));
                    //return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }else {
                    $this->Flash->error(__('Senha não foi alterada com sucesso'));
                }

            }
        }else {
            $this->Flash->error(__('Link inválido!'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function editSenha($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Senha editada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->danger(__('Erro ao editar a senha.'));
        }
        $this->set(compact('user'));
    }


    //Modo com redimensionamento da imagem
    public function alterarFotoPerfil()
    {   //recuperar os dados do usuário logado
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id, [
            'contain' => []
        ]); //bucando informações no BD
        $imageAntiga = $user->image;
        if($this->request->is(['patch','post','put'])){
            $imgNome = $this->request->getData()['image']['name'];
            $imgTmp = $this->request->getData()['image']['tmp_name'];
            $user = $this->Users->newEntity();
            $user->id = $user_id;
            $user->image = $imgNome;
            $destino = WWW_ROOT.'files' . DS . 'user' . DS . $user_id . DS; //DS é igual o \\ no windows ou / no linux, é usado para se encaixar nos dois
            if(move_uploaded_file($imgTmp, $destino.$imgNome)){
                if($this->Users->save($user)){
                    if(($imageAntiga !== null) AND ($imageAntiga !== $user->image)){
                        unlink($destino.$imageAntiga); //o unlink vai excluir a última img,para isso basta mostrar o diretorio
                    }
                    $this->Flash->success(__('Foto editada com sucesso.'));
                    return $this->redirect(['controller'=>'Users', 'action'=>'perfil']);
                } else{
                    $this->Flash->danger(__('Erro ao editar foto, tente de novo.'));
                }
            }
        }

        $this->set(compact('user'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $destino = WWW_ROOT. "files" . DS . "user" . DS . $user->id . DS; //DS é igual o \\ no windows ou / no linux, é usado para se encaixar nos dois
        $this->Users->deleteArq($destino);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Deletado com sucesso.'));
        } else {
            $this->Flash->danger(__('Erro ao deletar, tente de novo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
    /* public function deleteUser($id){

        if ($this->request->is('get')) {
            $this->request->allowMethod(['post', 'delete']);
        }

        if ($this->Category->delete($id)) {
            $this->Session->setFlash( 'Votre élément a été supprimé.','default',array(),'success');
            return $this->redirect(array('action' => 'index'));
        }

    } */
}