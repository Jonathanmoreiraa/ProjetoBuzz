<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * MediasSocials Controller
 *
 * @property \App\Model\Table\MediasSocialsTable $MediasSocials
 *
 * @method \App\Model\Entity\MediasSocial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MediasSocialsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Situations'],
        ];
        $mediasSocials = $this->paginate($this->MediasSocials);

        $this->set(compact('mediasSocials'));
    }

    /**
     * View method
     *
     * @param string|null $id Medias Social id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mediasSocial = $this->MediasSocials->get($id, [
            'contain' => ['Situations'],
        ]);

        $this->set('mediasSocial', $mediasSocial);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mediasSocial = $this->MediasSocials->newEntity();
        if ($this->request->is('post')) {
            $mediasSocial = $this->MediasSocials->patchEntity($mediasSocial, $this->request->getData());
            if ($this->MediasSocials->save($mediasSocial)) {
                $this->Flash->success(__('Rede social salva com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar rede social, tente outra vez!'));
        }
        $situations = $this->MediasSocials->Situations->find('list', ['limit' => 200]);
        $this->set(compact('mediasSocial', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Medias Social id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mediasSocial = $this->MediasSocials->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mediasSocial = $this->MediasSocials->patchEntity($mediasSocial, $this->request->getData());
            if ($this->MediasSocials->save($mediasSocial)) {
                $this->Flash->success(__('Rede social editada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar rede social, tente outra vez!'));
        }
        $situations = $this->MediasSocials->Situations->find('list', ['limit' => 200]);
        $this->set(compact('mediasSocial', 'situations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Medias Social id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mediasSocial = $this->MediasSocials->get($id);
        if ($this->MediasSocials->delete($mediasSocial)) {
            $this->Flash->success(__('The medias social has been deleted.'));
        } else {
            $this->Flash->error(__('The medias social could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
