<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmpresasSobs Model
 *
 * @property \App\Model\Table\SituationsTable&\Cake\ORM\Association\BelongsTo $Situations
 *
 * @method \App\Model\Entity\EmpresasSob get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmpresasSob newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmpresasSob[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmpresasSob|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpresasSob saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpresasSob patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmpresasSob[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmpresasSob findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmpresasSobsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('empresas_sobs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        //Adicionando os métodos usados ppara não dar erro de autenticação
        $this->addBehavior('Upload');
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteArq');

        $this->belongsTo('Situations', [
            'foreignKey' => 'situations_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('tittle')
            ->maxLength('tittle', 220)
            ->notEmptyString('tittle', 'Título é obrigatório');

        $validator
            ->scalar('description')
            ->notEmptyString('description', 'Descrição é obrigatória');

        $validator
            ->notEmptyFile('image', 'É preciso selecionar uma imagem')
            ->add('image', 'file', [
                'rule' => ['mimetype', ['image/jpeg','image/png']], 
                'message'=> 'Extensão da foto inválida, selecione foto JPEG ou PNG',
            ]);

        $validator
            ->integer('ordem')
            ->notEmptyString('ordem');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['situations_id'], 'Situations'));

        return $rules;
    }
    public function getUltimoEmpresasSobs(){
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->order(['EmpresasSobs.ordem'=>'DESC']);
        return $query->first(); //recupera o primeiro resultado
    }
    public function getSobEmpreAtual($id){
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->where(['EmpresasSobs.id ='=>$id])
                    ->order(['EmpresasSobs.ordem'=>'DESC']);
        return $query->first();
    }
    public function getSobEmpreMenor($ordemMenor){
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->where(['EmpresasSobs.ordem ='=>$ordemMenor])
                    ->order(['EmpresasSobs.ordem'=>'DESC']);
        return $query->first();
    }
    public function getEmpresasProxItem($ordem){
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->where(['EmpresasSobs.ordem ='=>$ordem])
                    ->order(['EmpresasSobs.ordem'=>'ASC']);
        return $query->first();
    }
    public function getListarEmpSob(){ //não precisa ter um parâmentro, pois trará todos os dados, exceto os inativos 
        $query = $this->find()
                    ->select(['id', 'tittle','description','image', 'ordem'])
                    ->where(['EmpresasSobs.situations_id ='=> 2])
                    ->order(['EmpresasSobs.ordem'=>'ASC']);
        return $query;
    }
}
