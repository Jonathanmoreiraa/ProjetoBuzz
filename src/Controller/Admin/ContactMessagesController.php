<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Shell\Helper\TableHelper;

/**
 * ContactMessages Controller
 *
 * @property \App\Model\Table\ContactMessagesTable $ContactMessages
 *
 * @method \App\Model\Entity\ContactMessage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactMessagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'ContMessageSituations'],
        ];
        $contactMessages = $this->paginate($this->ContactMessages);

        $this->set(compact('contactMessages')); 
    }

    /**
     * View method
     *
     * @param string|null $id Contact Message id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //Criar função que muda o status do botão de pendente para aberto ao clicar em visualizar.
        $contactMessageTable = TableRegistry::get('ContactMessages');
        $contactMsgResult = $contactMessageTable->getSituationMessage($id);

        if($contactMsgResult){
            $contactMessage = $contactMessageTable->newEntity();

            $contactMessage->id = $id;
            $contactMessage->cont_message_situation_id = 2; //Muda o status para o aberto
            
            $contactMessageTable->save($contactMessage);
        }
        $contactMessage = $this->ContactMessages->get($id, [
            'contain' => ['Users', 'ContMessageSituations', 'ContMessageSituations.Colors'],//o ContMessageSituations.colors permite que a gente usa a tabela colors.
        ]);

        $this->set('contactMessage', $contactMessage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactMessage = $this->ContactMessages->newEntity();
        if ($this->request->is('post')) {
            $contactMessage = $this->ContactMessages->patchEntity($contactMessage, $this->request->getData());
            if ($this->ContactMessages->save($contactMessage)) {
                $this->Flash->success(__('Mensagem de contato salva com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar mensagem de contato, tente outras vez!'));
        }
        $users = $this->ContactMessages->Users->find('list', ['limit' => 200]);
        $contMessageSituations = $this->ContactMessages->ContMessageSituations->find('list', ['limit' => 200]);
        $this->set(compact('contactMessage', 'users', 'contMessageSituations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Message id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactMessage = $this->ContactMessages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactMessage = $this->ContactMessages->patchEntity($contactMessage, $this->request->getData());
            if ($this->ContactMessages->save($contactMessage)) {
                $this->Flash->success(__('Mensagem de contato editada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao deletar mensagem de contato, tente outras vez!'));
        }
        $users = $this->ContactMessages->Users->find('list', ['limit' => 200]);
        $contMessageSituations = $this->ContactMessages->ContMessageSituations->find('list', ['limit' => 200]);
        $this->set(compact('contactMessage', 'users', 'contMessageSituations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactMessage = $this->ContactMessages->get($id);
        if ($this->ContactMessages->delete($contactMessage)) {
            $this->Flash->success(__('Mensagem de contato deletada com sucesso!'));
        } else {
            $this->Flash->error(__('Erro ao deletar mensagem de contato, tente outras vez!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
