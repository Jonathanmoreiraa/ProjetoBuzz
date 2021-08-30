<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Depositions Controller
 *
 * @property \App\Model\Table\DepositionsTable $Depositions
 *
 * @method \App\Model\Entity\Deposition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepositionsController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Deposition id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deposition = $this->Depositions->get($id, [
            'contain' => [],
        ]);

        $this->set('deposition', $deposition);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deposition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deposition = $this->Depositions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deposition = $this->Depositions->patchEntity($deposition, $this->request->getData());
            if ($this->Depositions->save($deposition)) {
                $this->Flash->success(__('Depoimento editado com sucesso!'));

                return $this->redirect(['action' => 'view', $deposition->id]);
            }
            $this->Flash->error(__('Erro ao editar o depoimento, tente outra vez!'));
        }
        $this->set(compact('deposition'));
    }

}
