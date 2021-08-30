<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * EmpresasSobs Controller
 *
 * @property \App\Model\Table\EmpresasSobsTable $EmpresasSobs
 *
 * @method \App\Model\Entity\EmpresasSob[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmpresasSobsController extends AppController
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
            'order'=>['EmpresasSobs.ordem'=>'ASC']//Deixa a ordem em crescente, a partir da ordem e não id

        ];
        $empresasSobs = $this->paginate($this->EmpresasSobs);

        $this->set(compact('empresasSobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Empresas Sob id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empresasSob = $this->EmpresasSobs->get($id, [
            'contain' => ['Situations'],
        ]);

        $this->set('empresasSob', $empresasSob);
    }
    public function altOrdemEmpresasSobs($id = null)
    {
        $empresasSobTable = TableRegistry::get('EmpresasSobs'); //pega a tabela Sobre a empresa
        $sobEmpreAtual = $empresasSobTable->getSobEmpreAtual($id);
       
        $ordemMenor = $sobEmpreAtual->ordem - 1; //altera o ordem
        $sobEmpreMenor = $empresasSobTable -> getSobEmpreMenor($ordemMenor);

        if ($sobEmpreMenor){
            $empresasSobAtual = $this->EmpresasSobs->newEntity(); //cria uma nova identidade
            $empresasSobAtual->id = $sobEmpreAtual->id;
            $empresasSobAtual->ordem = $sobEmpreAtual->ordem - 1; //ação que faz a ordem mudar em si, essa vai diminiuir um
            $this->EmpresasSobs->save($empresasSobAtual);

            $empresasSobMenor = $this->EmpresasSobs->newEntity();
            $empresasSobMenor->id = $sobEmpreMenor->id;
            $empresasSobMenor->ordem = $sobEmpreMenor->ordem + 1;//essa ação vai aumentar o outro anterior par a próxima
            $this->EmpresasSobs->save($empresasSobMenor);

            $this->Flash->success(__('Ordem alterada com sucesso!'));
            return $this->redirect(['controller' => 'EmpresasSobs', 'action' => 'index']); 
        }else{
            $this->Flash->danger(__('Erro ao alterar a ordem!'));
            return $this->redirect(['controller' => 'EmpresasSobs', 'action' => 'index']); 

        }
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empresasSob = $this->EmpresasSobs->newEntity();
        if ($this->request->is('post')) {
            $empresasSob = $this->EmpresasSobs->patchEntity($empresasSob, $this->request->getData());
            if(!$empresasSob->errors()){//verifica se tem erro
                $empresasSob->image = $this->EmpresasSobs->slugUploadImgRed($this->request->getData()['image']['name']);//tira os caracteres especiais

                $empresasSobTable = TableRegistry::get('EmpresasSobs');
                $ultimoSlide = $empresasSobTable->getUltimoEmpresasSobs();//recupera o último sobre empres da ordem
                $empresasSob->ordem = $ultimoSlide->ordem + 1;//pega o último slide da ordem e acrescenta +1 no novo

                if ($resultSave = $this->EmpresasSobs->save($empresasSob)){
                    $id = $resultSave->id; // ultimo id inserido
                    
                    $destino = WWW_ROOT. "files" . DS . "empresassob" . DS . $id . DS;                
                    $imgUpload = $this->request->getData()['image'];
                    $imgUpload['name'] = $empresasSob->image;
                    
                    if($this->EmpresasSobs->uploadImgRed($imgUpload, $destino, 750, 400)){
                        $this->Flash->success(__('Sobre Empresa cadastrado com sucesso'));
                        return $this->redirect(['controller' => 'EmpresasSobs', 'action' => 'view', $id]);
                    }else{
                        $this->Flash->danger(__('Erro ao realizar o upload!'));
                    }
                }
            }else{
                    $this->Flash->error(__('Erro ao salvar, tente outra vez!'));
            }
        }
        $situations = $this->EmpresasSobs->Situations->find('list', ['limit' => 200]);
        $this->set(compact('empresasSob', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Empresas Sob id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empresasSob = $this->EmpresasSobs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresasSob = $this->EmpresasSobs->patchEntity($empresasSob, $this->request->getData());
            if ($this->EmpresasSobs->save($empresasSob)) {
                $this->Flash->success(__('Item de sobre empresa editado com sucesso.'));

                return $this->redirect(['action' => 'view', $empresasSob->id]);
            }
            $this->Flash->error(__('Erro ao editar o item de sobre a empresa.'));
        }
        $situations = $this->EmpresasSobs->Situations->find('list', ['limit' => 200]);
        $this->set(compact('empresasSob', 'situations'));
    }
    public function alterarFotoSobempre($id=null)
    {   //recuperar os dados do usuário logado
        $empresasSob = $this->EmpresasSobs->get($id); //bucando informações no BD
        $imageAntiga = $empresasSob->image;
        if ($this->request->is(['patch','post', 'put'])) {
            $empresasSob = $this->EmpresasSobs->newEntity();
            $empresasSob = $this->EmpresasSobs->patchEntity($empresasSob, $this->request->getData());
            if(!$empresasSob->errors()){//verifica se tem erro
                $empresasSob->image = $this->EmpresasSobs->slugUploadImgRed($this->request->getData()['image']['name']);//tira os caracteres especiais
                $empresasSob->id = $id;
                if ($this->EmpresasSobs->save($empresasSob)){                    
                    $destino = WWW_ROOT. "files" . DS . "empresassob" . DS . $id . DS;                
                    $imgUpload = $this->request->getData()['image'];
                    $imgUpload['name'] = $empresasSob->image;

                    if($this->EmpresasSobs->uploadImgRed($imgUpload, $destino, 750, 400)){
                        $this->EmpresasSobs->deletefile($destino, $imageAntiga, $empresasSob->image);//usa o método deletefile para excluir a imagem antiga.
                        $this->Flash->success(__('Imagem editada com sucesso'));
                        return $this->redirect(['controller' => 'EmpresasSobs', 'action' => 'view', $id]);
                    }else{
                        $empresasSob->image=$imageAntiga;
                        $this->EmpresasSobs->save($empresasSob);
                        $this->Flash->danger(__('Erro: Imagem não foi cadastrada com sucesso. Erro ao realizar o upload'));
                    }
                }else{
                    $this->Flash->error(__('Erro: Item do Sobre Empresa não foi cadastrado com sucesso'));
                }    
            }else{
                $this->Flash->error(__('Erro: Item do Sobre Empresanão foi cadastrado com sucesso'));
            } 
    
        }
        $this->set(compact('empresasSob'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Empresas Sob id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empresasSob = $this->EmpresasSobs->get($id); //ela recebe os dados usando o ID como parametro
        //acessa o destino para excluir
        $destino = WWW_ROOT. "files" . DS . "empresassob" . DS . $empresasSob->id . DS; //DS é igual o \\ no windows ou / no linux, é usado para se encaixar nos dois
        $this->EmpresasSobs->deleteArq($destino);//o Behavior deleteArq precisa ser incluido para excluir
        $empresasSobTable = TableRegistry::get('EmpresasSobs'); //registra EmpresasSobs em uma table
        $listaSlideProx = $empresasSobTable->getEmpresasProxItem($empresasSob->ordem); //busca o método get na EmpresasSobsTable.

        if ($this->EmpresasSobs->delete($empresasSob)) {
            foreach ($listaSlideProx as $slideProx) {
                $empresasSob->ordem = $slideProx->ordem - 1; //diminui um número na coluna ordem.
                $empresasSob->id = $slideProx->id; //salva essa ordem no usuáro com o id na orde.
                $this->EmpresasSobs->save($empresasSob);
            }
            $this->Flash->success(__('Item do sobre empresa deletado com sucesso!'));
        } else {
            $this->Flash->error(__('Erro ao apagar o item do sobre empresa!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
