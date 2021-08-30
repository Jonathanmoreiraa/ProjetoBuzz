<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Services Model
 *
 * @method \App\Model\Entity\Service get($primaryKey, $options = [])
 * @method \App\Model\Entity\Service newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Service[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Service|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Service saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Service patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Service[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Service findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServicesTable extends Table
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

        $this->setTable('services');
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
            ->scalar('tittle_ser')
            ->maxLength('tittle_ser', 220)
            ->notEmptyString('tittle_ser', 'Título do serviço é obrigatório!');

        $validator
            ->scalar('icon_one')
            ->maxLength('icon_one', 45)
            ->notEmptyString('icon_one', 'Ícone do serviço é obrigatório!');

        $validator
            ->scalar('tittle_one')
            ->maxLength('tittle_one', 45)
            ->notEmptyString('tittle_one', 'Título do serviço é obrigatório!');

        $validator
            ->scalar('description_one')
            ->notEmptyString('description_one', 'Descrição do serviço é obrigatório!');

        $validator
            ->scalar('icon_two')
            ->maxLength('icon_two', 45)
            ->notEmptyString('icon_two', 'Ícone do serviço é obrigatório!');

        $validator
            ->scalar('tittle_two')
            ->maxLength('tittle_two', 45)
            ->requirePresence('tittle_two', 'create')
            ->notEmptyString('tittle_two', 'Título do serviço é obrigatório!');

        $validator
            ->scalar('description_two')
            ->notEmptyString('description_two', 'Descrição do serviço é obrigatório!');

        $validator
            ->scalar('icon_three')
            ->maxLength('icon_three', 45)
            ->notEmptyString('icon_three', 'Ícone do serviço é obrigatório!');

        $validator
            ->scalar('tittle_three')
            ->maxLength('tittle_three', 45)
            ->notEmptyString('tittle_three', 'Título do serviço é obrigatório!');

        $validator
            ->scalar('description_three')
            ->notEmptyString('description_three', 'Descrição do serviço é obrigatório!');

        return $validator;
    }
    //mostrar as informações da tabela services
    public function getListarServiceHome($id){
        $query = $this->find()
                    ->select(['tittle_ser','icon_one','tittle_one','description_one','icon_two','tittle_two','description_two','icon_three',  'tittle_three',  'description_three'])
                    ->where(['Services.id ='=>$id]);
        return $query->first();
    }
}
