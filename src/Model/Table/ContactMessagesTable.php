<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContactMessages Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ContMessageSituationsTable&\Cake\ORM\Association\BelongsTo $ContMessageSituations
 *
 * @method \App\Model\Entity\ContactMessage get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContactMessage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContactMessage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContactMessage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContactMessage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContactMessage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContactMessage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContactMessage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContactMessagesTable extends Table
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

        $this->setTable('contact_messages');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
        ]);
        $this->belongsTo('ContMessageSituations', [
            'foreignKey' => 'cont_message_situation_id',
            'joinType' => 'INNER', //faz as mensagens seguirem uma ordem aparecerem primeiro, pendentes primeiro, depois os abertos e depois os respondidos
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
            ->scalar('name')
            ->maxLength('name', 220)
            ->requirePresence('name', 'create')
            ->notEmptyString('name', 'Nome do remetente é obrigatório!');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email', 'O e-mail do remetente é obrigatório!');

        $validator
            ->scalar('subject')
            ->maxLength('subject', 220)
            ->requirePresence('subject', 'create')
            ->notEmptyString('subject', 'O assunto da mensagem é obrigatório!');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmptyString('message','O conteúdo da mensagem é obrigatório!' );
        

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
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['cont_message_situation_id'], 'ContMessageSituations'));

        return $rules;
    }
    public function getSituationMessage($id){
        $query = $this->find()
                    ->select(['id'])
                    ->where(['ContactMessages.id ='=>$id, 'ContactMessages.cont_message_situation_id ='=>1])
                    ->order(['ContactMessages.id'=>'ASC']);
        return $query->first();
    }
    
}
