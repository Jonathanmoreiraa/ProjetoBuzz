<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ArticlesCategories Controller
 *
 * @property \App\Model\Table\ArticlesCategoriesTable $ArticlesCategories
 *
 * @method \App\Model\Entity\ArticlesCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesCategoriesController extends AppController
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
        $articlesCategories = $this->paginate($this->ArticlesCategories);

        $this->set(compact('articlesCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Articles Category id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesCategory = $this->ArticlesCategories->get($id, [
            'contain' => ['Situations'],
        ]);

        $this->set('articlesCategory', $articlesCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesCategory = $this->ArticlesCategories->newEntity();
        if ($this->request->is('post')) {
            $articlesCategory = $this->ArticlesCategories->patchEntity($articlesCategory, $this->request->getData());
            if ($this->ArticlesCategories->save($articlesCategory)) {
                $this->Flash->success(__('The articles category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles category could not be saved. Please, try again.'));
        }
        $situations = $this->ArticlesCategories->Situations->find('list', ['limit' => 200]);
        $this->set(compact('articlesCategory', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesCategory = $this->ArticlesCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesCategory = $this->ArticlesCategories->patchEntity($articlesCategory, $this->request->getData());
            if ($this->ArticlesCategories->save($articlesCategory)) {
                $this->Flash->success(__('The articles category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles category could not be saved. Please, try again.'));
        }
        $situations = $this->ArticlesCategories->Situations->find('list', ['limit' => 200]);
        $this->set(compact('articlesCategory', 'situations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesCategory = $this->ArticlesCategories->get($id);
        if ($this->ArticlesCategories->delete($articlesCategory)) {
            $this->Flash->success(__('The articles category has been deleted.'));
        } else {
            $this->Flash->error(__('The articles category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
