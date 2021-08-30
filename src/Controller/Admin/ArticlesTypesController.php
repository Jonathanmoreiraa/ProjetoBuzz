<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ArticlesTypes Controller
 *
 * @property \App\Model\Table\ArticlesTypesTable $ArticlesTypes
 *
 * @method \App\Model\Entity\ArticlesType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $articlesTypes = $this->paginate($this->ArticlesTypes);

        $this->set(compact('articlesTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Articles Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesType = $this->ArticlesTypes->get($id, [
            'contain' => [],
        ]);

        $this->set('articlesType', $articlesType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesType = $this->ArticlesTypes->newEntity();
        if ($this->request->is('post')) {
            $articlesType = $this->ArticlesTypes->patchEntity($articlesType, $this->request->getData());
            if ($this->ArticlesTypes->save($articlesType)) {
                $this->Flash->success(__('The articles type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles type could not be saved. Please, try again.'));
        }
        $this->set(compact('articlesType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesType = $this->ArticlesTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesType = $this->ArticlesTypes->patchEntity($articlesType, $this->request->getData());
            if ($this->ArticlesTypes->save($articlesType)) {
                $this->Flash->success(__('The articles type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles type could not be saved. Please, try again.'));
        }
        $this->set(compact('articlesType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesType = $this->ArticlesTypes->get($id);
        if ($this->ArticlesTypes->delete($articlesType)) {
            $this->Flash->success(__('The articles type has been deleted.'));
        } else {
            $this->Flash->error(__('The articles type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
