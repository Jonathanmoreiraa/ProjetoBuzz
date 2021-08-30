<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Robots', 'Users', 'Situations', 'ArticlesTypes', 'ArticlesCategories'],
        ];
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Robots', 'Users', 'Situations', 'ArticlesTypes', 'ArticlesCategories'],
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if(!$article->errors()){

                $article->user_id = $this->Auth->user('id');
                $article->slug = $this->Articles->slugUrlSimples($this->request->getData()['slug']); //request recupera os dados do formulário.
                
                 if ($resultSave = $this->Articles->save($article)){
                    $id = $resultSave->id; // último id inserido
                    
                    $this->Flash->success(__('Artigo cadastrado com sucesso'));
                    return $this->redirect(['controller' => 'Articles', 'action' => 'view', $id]);
                }else{
                    $this->Flash->error(__('Erro: Artigo não foi cadastrado com sucesso'));
                }    

            }else{
                $this->Flash->error(__('Erro: Artigo não foi cadastrado com sucesso'));
            } 
        }
        $robots = $this->Articles->Robots->find('list', ['limit' => 200]);
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $situations = $this->Articles->Situations->find('list', ['limit' => 200]);
        $articlesTypes = $this->Articles->ArticlesTypes->find('list', ['limit' => 200]);
        $articlesCategories = $this->Articles->ArticlesCategories->find('list', ['limit' => 200]);
        $this->set(compact('article', 'robots', 'users', 'situations', 'articlesTypes', 'articlesCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('O artigo foi editado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar o artigo. Tente outra vez.'));
        }
        $robots = $this->Articles->Robots->find('list', ['limit' => 200]);
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $situations = $this->Articles->Situations->find('list', ['limit' => 200]);
        $articlesTypes = $this->Articles->ArticlesTypes->find('list', ['limit' => 200]);
        $articlesCategories = $this->Articles->ArticlesCategories->find('list', ['limit' => 200]);
        $this->set(compact('article', 'robots', 'users', 'situations', 'articlesTypes', 'articlesCategories'));
    }
    public function alterarFotoArtigo($id = null)
    {
        $article = $this->Articles->get($id);
        $imageAntiga = $article->image;
        if ($this->request->is(['patch','post', 'put'])) {
            $article = $this->Articles->newEntity();
            if(!$article->errors()){//verifica se tem erro
                $article->image = $this->Articles->slugUploadImgRed($this->request->getData()['image']['name']);//tira os caracteres especiais
                $article->id = $id;
                if ($this->Articles->save($article)){                    
                    $destino = WWW_ROOT. "files" . DS . "articles" . DS . $id . DS;                
                    $imgUpload = $this->request->getData()['image'];

                    if($this->Articles->uploadImgRed($imgUpload, $destino, 1920, 1024)){
                        if(($imageAntiga !== "") AND ($imageAntiga !== $article->image)){
                            unlink($destino.$imageAntiga); //o unlink vai excluir a última img,para isso basta mostrar o diretorio
                        }
                        $this->Flash->success(__('Imagem editada com sucesso'));
                        return $this->redirect(['controller' => 'Articles', 'action' => 'view', $id]);
                    }else{
                        $article->image=$imageAntiga;
                        $this->Articles->save($article);
                        $this->Flash->danger(__('Erro: Imagem não foi editada com sucesso. Erro ao realizar o upload'));
                    }
                }else{
                    $this->Flash->error(__('Erro: Slide do Artigo não foi editado com sucesso'));
                }    
            }else{
                $this->Flash->error(__('Erro: Slide do Artigo não foi editado com sucesso'));
            } 
    
        }
        //fazer A PARTE DE ADICIONAR IMAGEM
        

        $this->set(compact('article'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        $destino = WWW_ROOT. "files" . DS . "articles" . DS . $article->id . DS; //DS é igual o \\ no windows ou / no linux, é usado para se encaixar nos dois
        $this->Articles->deleteArq($destino);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('Artigo deletado com sucesso!'));
        } else {
            $this->Flash->error(__('Erro ao deletar o artigo, tente outra vez!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
