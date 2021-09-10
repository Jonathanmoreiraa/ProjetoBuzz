<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Carousel;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Carousels Controller
 *
 * @property \App\Model\Table\CarouselsTable $Carousels
 *
 * @method \App\Model\Entity\Carousel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarouselsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Positions', 'Colors', 'Situations'],
            'order'=>['Carousels.ordem'=>'ASC']//Deixa a ordem em crescente
        ];
        $carousels = $this->paginate($this->Carousels);

        $this->set(compact('carousels'));
    }

    /**
     * View method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carousel = $this->Carousels->get($id, [
            'contain' => ['Positions', 'Colors', 'Situations'],
        ]);

        $this->set('carousel', $carousel);
    }
    // Alterar a ordem dos slides
    public function altOrdemCarousel($id = null)
    {
        $carouselTable = TableRegistry::get('Carousels'); //pega a tabela carousels
        $slideAtual = $carouselTable->getSlideAtual($id);
       
        $ordemMenor = $slideAtual->ordem - 1; //altera o ordem
        $slideMenor = $carouselTable -> getSlideMenor($ordemMenor);

        if ($slideMenor){
            $carouselAtual = $this->Carousels->newEntity(); //cria uma nova identidade
            $carouselAtual->id = $slideAtual->id;
            $carouselAtual->ordem = $slideAtual->ordem - 1; //ação que faz a ordem mudar em si, essa vai diminiuir um
            $this->Carousels->save($carouselAtual);

            $carouselMenor = $this->Carousels->newEntity();
            $carouselMenor->id = $slideMenor->id;
            $carouselMenor->ordem = $slideMenor->ordem + 1;//essa ação vai aumentar o outro anterior par a próxima
            $this->Carousels->save($carouselMenor);

            $this->Flash->success(__('Ordem alterada com sucesso!'));
            return $this->redirect(['controller' => 'Carousels', 'action' => 'index']); 
        }else{
            $this->Flash->danger(__('Erro ao alterar a ordem!'));
            return $this->redirect(['controller' => 'Carousels', 'action' => 'index']); 

        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carousel = $this->Carousels->newEntity();
        if ($this->request->is('post')) {

            $carousel = $this->Carousels->patchEntity($carousel, $this->request->getData());
            if(!$carousel->errors()){

                $carouselTable = TableRegistry::get('Carousels');
                $ultimoSlide = $carouselTable->getUltimoSlide();
                $carousel->ordem = $ultimoSlide->ordem + 1;

                if ($resultSave = $this->Carousels->save($carousel)){
                    $id = $resultSave->id; // último id inserido
                    $destino = WWW_ROOT. "files" . DS . "carousel" . DS . $id . DS;                
                    $this->Carousels->criarDiretorioImgRed($destino);
                    $this->Flash->success(__('Carousel cadastrado com sucesso'));
                    return $this->redirect(['controller' => 'Carousels', 'action' => 'addImageCarousel', $id]);
                }else{
                    $this->Flash->error(__('Erro: Slide do carousel não foi cadastrado com sucesso'));
                }    
            }else{
                $this->Flash->error(__('Erro: Slide do carousel não foi cadastrado com sucesso'));
            } 
    
        }
        $positions = $this->Carousels->Positions->find('list', ['limit' => 200]);
        $colors = $this->Carousels->Colors->find('list', ['limit' => 200]);
        $situations = $this->Carousels->Situations->find('list', ['limit' => 200]);
        $this->set(compact('carousel', 'positions', 'colors', 'situations'));
    }
    public function addImageCarousel($id = null){
        $carousel = $this->Carousels->get($id);
        $imageAntiga = $carousel->image;
        if ($this->request->is(['patch','post', 'put'])) {
            $carousel = $this->Carousels->newEntity();
            if(!$carousel->errors()){//verifica se tem erro
                $carousel->image = $this->Carousels->slugUploadImgRed($this->request->getData()['image']['name']);//tira os caracteres especiais
                $carousel->id = $id;
                if ($this->Carousels->save($carousel)){                    
                    $destino = WWW_ROOT. "files" . DS . "carousel" . DS . $id . DS;                
                    $imgUpload = $this->request->getData()['image'];

                    if($this->Carousels->uploadImgRed($imgUpload, $destino, 1920, 1024)){
                        if(($imageAntiga !== "") AND ($imageAntiga !== $carousel->image)){
                            unlink($destino.$imageAntiga); //o unlink vai excluir a última img,para isso basta mostrar o diretorio
                        }
                        $this->Flash->success(__('Imagem editada com sucesso'));
                        return $this->redirect(['controller' => 'Carousels', 'action' => 'view', $id]);
                    }else{
                        $carousel->image=$imageAntiga;
                        $this->Carousels->save($carousel);
                        $this->Flash->danger(__('Erro: Imagem não foi cadastrada com sucesso. Erro ao realizar o upload'));
                    }
                }else{
                    $this->Flash->error(__('Erro: Slide do carousel não foi cadastrado com sucesso'));
                }    
            }else{
                $this->Flash->error(__('Erro: Slide do carousel não foi cadastrado com sucesso'));
            } 
        }
        $this->set(compact('carousel'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carousel = $this->Carousels->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carousel = $this->Carousels->patchEntity($carousel, $this->request->getData());
            if ((!empty(($carousel->tittle_button) OR ($carousel->link)) AND ($carousel->colors_id == ""))){ //se o titulo tiver nformação e o a cor do botção não, acessa esse if
                $this->Flash->error(__('Erro: Escolha uma cor para o botão!'));
            }
            else if ((($carousel->link)) AND ($carousel->tittle_button == "")){// vice_versa acesse esse else if
                $this->Flash->error(__('Erro: Adicone um titulo para o botão!'));
            }
            else if(!empty(($carousel->tittle_button)) AND ($carousel->link == "")){
                $this->Flash->error(__('Erro: Adicione um link ao botão'));
            }
            else{
                if ($this->Carousels->save($carousel)) {
                    $this->Flash->success(__('O slide do carrousel foi salvo com sucesso!'));
                    return $this->redirect(['controller'=>'Carousels','action' => 'view', $id]);
                }else{
                    $this->Flash->error(__('Erro ao salvar o slide!'));
                }
            }
        }
        $positions = $this->Carousels->Positions->find('list', ['limit' => 200]);
        $colors = $this->Carousels->Colors->find('list', ['limit' => 200]);
        $situations = $this->Carousels->Situations->find('list', ['limit' => 200]);
        $this->set(compact('carousel', 'positions', 'colors', 'situations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carousel = $this->Carousels->get($id); //ela recebe os dados usando o ID como parametro
        //acessa o destino para excluir
        $destino = WWW_ROOT. "files" . DS . "carousel" . DS . $carousel->id . DS; //DS é igual o \\ no windows ou / no linux, é usado para se encaixar nos dois
        $carouselTable = TableRegistry::get('Carousels'); //registra Carousels em uma table
        $listaSlideProx = $carouselTable->getListProxSlide($carousel->ordem); //busca o método get na CarouselsTable.

        $this->Carousels->deleteArq($destino);//o Behavior deleteArq precisa ser incluido para excluir
        if ($this->Carousels->delete($carousel)) {
            foreach ($listaSlideProx as $slideProx) {
                $carousel->ordem = $slideProx->ordem - 1; //diminui um número na coluna ordem.
                $carousel->id = $slideProx->id; //salva essa ordem no usuáro com o id na orde.
                $this->Carousels->save($carousel);
            }
            $this->Flash->success(__('Slide do carrousel deletado com sucesso!'));
        } else {
            $this->Flash->error(__('Erro ao apagar o slide!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
