<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContMessageSituations Model
 *
 * @property \App\Model\Table\ColorsTable&\Cake\ORM\Association\BelongsTo $Colors
 * @property \App\Model\Table\ContactMessagesTable&\Cake\ORM\Association\HasMany $ContactMessages
 *
 * @method \App\Model\Entity\ContMessageSituation get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContMessageSituation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContMessageSituation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContMessageSituation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContMessageSituation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContMessageSituation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContMessageSituation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContMessageSituation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContMessageSituationsTable extends Table
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

        $this->setTable('cont_message_situations');
        $this->setDisplayField('name_message_situation'); //envia para as outras colunas o nome, não o id
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Colors', [
            'foreignKey' => 'colors_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ContactMessages', [
            'foreignKey' => 'cont_message_situation_id',
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
            ->scalar('name_message_situation')
            ->maxLength('name_message_situation', 220)
            ->requirePresence('name_message_situation', 'create')
            ->notEmptyString('name_message_situation');

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
        $rules->add($rules->existsIn(['colors_id'], 'Colors'));

        return $rules;
    }
}
