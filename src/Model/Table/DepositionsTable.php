<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Depositions Model
 *
 * @method \App\Model\Entity\Deposition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Deposition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Deposition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Deposition|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Deposition saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Deposition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Deposition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Deposition findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DepositionsTable extends Table
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

        $this->setTable('depositions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('name_dep')
            ->maxLength('name_dep', 220)
            ->requirePresence('name_dep', 'create')
            ->notEmptyString('name_dep');

        $validator
            ->scalar('description_dep')
            ->maxLength('description_dep', 220)
            ->requirePresence('description_dep', 'create')
            ->notEmptyString('description_dep');

        $validator
            ->scalar('video_one')
            ->maxLength('video_one', 320)
            ->requirePresence('video_one', 'create')
            ->notEmptyString('video_one');

        $validator
            ->scalar('video_two')
            ->maxLength('video_two', 320)
            ->requirePresence('video_two', 'create')
            ->notEmptyString('video_two');

        $validator
            ->scalar('video_three')
            ->maxLength('video_three', 320)
            ->requirePresence('video_three', 'create')
            ->notEmptyString('video_three');

        return $validator;
    }
    public function getListarDepositionsHome($id){//recebendo como parâmento o id, ele precisa estar sendo passado na (Telausada)controller.
        $query = $this->find()
                    ->select(['id', 'name_dep', 'description_dep', 'video_one', 'video_two', 'video_three'])
                    ->where(['Depositions.id ='=>$id]);
        return $query->first();
    }
}
