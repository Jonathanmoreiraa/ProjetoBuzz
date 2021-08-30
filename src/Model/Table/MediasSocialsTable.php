<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MediasSocials Model
 *
 * @property \App\Model\Table\SituationsTable&\Cake\ORM\Association\BelongsTo $Situations
 *
 * @method \App\Model\Entity\MediasSocial get($primaryKey, $options = [])
 * @method \App\Model\Entity\MediasSocial newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MediasSocial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MediasSocial|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MediasSocial saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MediasSocial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MediasSocial[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MediasSocial findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MediasSocialsTable extends Table
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

        $this->setTable('medias_socials');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Situations', [
            'foreignKey' => 'situations_id',
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
            ->scalar('tittle')
            ->maxLength('tittle', 220)
            ->requirePresence('tittle', 'create')
            ->notEmptyString('tittle');

        $validator
            ->scalar('link')
            ->maxLength('link', 220)
            ->requirePresence('link', 'create')
            ->notEmptyString('link');

        $validator
            ->scalar('icon')
            ->maxLength('icon', 45)
            ->requirePresence('icon', 'create')
            ->notEmptyString('icon');

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
    public function getListRedes(){
        $query = $this->find()
                    ->select(['tittle','link','icon', 'situations_id'])
                    ->order(['MediasSocials.situations_id ='=>'2'])
                    ->limit(8);
        return $query;
    }
}
