<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ContMessageSituations Controller
 *
 * @property \App\Model\Table\ContMessageSituationsTable $ContMessageSituations
 *
 * @method \App\Model\Entity\ContMessageSituation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContMessageSituationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Colors'],
        ];
        $contMessageSituations = $this->paginate($this->ContMessageSituations);

        $this->set(compact('contMessageSituations'));
    }

    /**
     * View method
     *
     * @param string|null $id Cont Message Situation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contMessageSituation = $this->ContMessageSituations->get($id, [
            'contain' => ['Colors', 'ContactMessages'],
        ]);

        $this->set('contMessageSituation', $contMessageSituation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contMessageSituation = $this->ContMessageSituations->newEntity();
        if ($this->request->is('post')) {
            $contMessageSituation = $this->ContMessageSituations->patchEntity($contMessageSituation, $this->request->getData());
            if ($this->ContMessageSituations->save($contMessageSituation)) {
                $this->Flash->success(__('The cont message situation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cont message situation could not be saved. Please, try again.'));
        }
        $colors = $this->ContMessageSituations->Colors->find('list', ['limit' => 200]);
        $this->set(compact('contMessageSituation', 'colors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cont Message Situation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contMessageSituation = $this->ContMessageSituations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contMessageSituation = $this->ContMessageSituations->patchEntity($contMessageSituation, $this->request->getData());
            if ($this->ContMessageSituations->save($contMessageSituation)) {
                $this->Flash->success(__('The cont message situation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cont message situation could not be saved. Please, try again.'));
        }
        $colors = $this->ContMessageSituations->Colors->find('list', ['limit' => 200]);
        $this->set(compact('contMessageSituation', 'colors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cont Message Situation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contMessageSituation = $this->ContMessageSituations->get($id);
        if ($this->ContMessageSituations->delete($contMessageSituation)) {
            $this->Flash->success(__('The cont message situation has been deleted.'));
        } else {
            $this->Flash->error(__('The cont message situation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
