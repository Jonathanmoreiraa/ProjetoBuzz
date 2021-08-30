<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carousels Model
 *
 * @property \App\Model\Table\PositionsTable&\Cake\ORM\Association\BelongsTo $Positions
 * @property \App\Model\Table\ColorsTable&\Cake\ORM\Association\BelongsTo $Colors
 * @property \App\Model\Table\SituationsTable&\Cake\ORM\Association\BelongsTo $Situations
 *
 * @method \App\Model\Entity\Carousel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Carousel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Carousel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carousel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carousel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carousel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Carousel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carousel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CarouselsTable extends Table
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

        $this->setTable('carousels');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        //Adicionando os métodos usados ppara não dar erro de autenticação
        $this->addBehavior('Upload');
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteArq');

        $this->belongsTo('Positions', [
            'foreignKey' => 'positions_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Colors', [
            'foreignKey' => 'colors_id',
        ]);
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name_carousel')
            ->maxLength('name_carousel', 220)
            //->requirePresence('name_carousel', 'create')
            ->notEmptyString('name_carousel', 'Nome  do carousel é obrigatório');

        $validator
            ->notEmptyFile('image', 'É preciso selecionar uma imagem')
            ->add('image', 'file', [
                'rule' => ['mimetype', ['image/jpeg','image/png']], 
                'message'=> 'Extensão da foto inválida, selecione foto JPEG ou PNG',
            ]);
        

        $validator
            ->scalar('tittle')
            ->maxLength('tittle', 220)
            ->allowEmptyString('tittle');

        $validator
            ->scalar('description')
            ->maxLength('description', 220)
            ->allowEmptyString('description');

        $validator
            ->scalar('tittle_button')
            ->maxLength('tittle_button', 220)
            ->allowEmptyString('tittle_button');

        $validator
            ->scalar('link')
            ->maxLength('link', 220)
            ->allowEmptyString('link');
        

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
        $rules->add($rules->existsIn(['positions_id'], 'Positions'));
        $rules->add($rules->existsIn(['colors_id'], 'Colors'));
        $rules->add($rules->existsIn(['situations_id'], 'Situations'));

        return $rules;
    }
    //Método para trazer o último slide da ordem, de forma decrescente
    public function getUltimoSlide(){
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->order(['Carousels.ordem'=>'DESC']);
        return $query->first(); //recupera o primeiro resultado
    }
    //método para os slides continuarem na ordem, mesmo que algum seja apagado
    public function getListProxSlide($ordem){
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->where(['Carousels.ordem >'=>$ordem])
                    ->order(['Carousels.ordem'=>'ASC']);
        return $query;
    }
    //método para mostrar os slides na home
    public function getListarSlidesHome(){
        $query = $this->find()
                    ->select(['id', 'image', 'tittle','description','tittle_button','link','ordem','positions_id','colors_id', 'Positions.position','Colors.color'/**recupera o position da tabela positions */])
                    ->contain(['Positions','Colors','Situations'])
                    ->where(['Carousels.situations_id ='=> 2])//verifica se o slide está como ativo
                    ->order(['Carousels.ordem'=>'ASC']);
        return $query;
    }
    public function getSlideAtual($id){
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->where(['Carousels.id ='=>$id])
                    ->order(['Carousels.ordem'=>'DESC']);
        return $query->first();
    }
    public function getSlideMenor($ordemMenor){
        $query = $this->find()
                    ->select(['id', 'ordem'])
                    ->where(['Carousels.ordem ='=>$ordemMenor])
                    ->order(['Carousels.ordem'=>'DESC']);
        return $query->first();
    }
}
