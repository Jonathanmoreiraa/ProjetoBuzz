<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @property \App\Model\Table\RobotsTable&\Cake\ORM\Association\BelongsTo $Robots
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SituationsTable&\Cake\ORM\Association\BelongsTo $Situations
 * @property \App\Model\Table\ArticlesTypesTable&\Cake\ORM\Association\BelongsTo $ArticlesTypes
 * @property \App\Model\Table\ArticlesCategoriesTable&\Cake\ORM\Association\BelongsTo $ArticlesCategories
 *
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticlesTable extends Table
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

        $this->setTable('articles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Upload');
        $this->addBehavior('UploadRed');
        $this->addBehavior('SlugUrl');
        $this->addBehavior('DeleteArq');

        $this->belongsTo('Robots', [
            'foreignKey' => 'robots_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Situations', [
            'foreignKey' => 'situations_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ArticlesTypes', [
            'foreignKey' => 'articles_types_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ArticlesCategories', [
            'foreignKey' => 'articles_categories_id',
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
            ->notEmptyString('tittle', 'O título é obrigatório!');

        /* $validator
            ->scalar('description_article')
            ->notEmptyString('description_article','A descrição do artigo é obrigatória');

        $validator
            ->scalar('content')
            ->notEmptyString('content', 'O conteúdo do artigo é obrigatório!'); */

        $validator
        ->notEmptyFile('image', 'É preciso selecionar uma imagem')
        ->add('image', 'file', [
            'rule' => ['mimetype', ['image/jpeg','image/png']], 
            'message'=> 'Extensão da foto inválida, selecione foto JPEG ou PNG',
        ]);

        $validator
            ->scalar('slug')
            ->maxLength('slug', 220)
            ->notEmptyString('slug', 'O slug é obrigatório!');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 220)
            ->notEmptyString('keywords', 'Por favor, acrescente no mínimo uma palavra-chave.');

        $validator
            ->scalar('description')
            ->maxLength('description', 220)
            ->notEmptyString('description', 'A descrição do SEO é obrigatório!');

        /* $validator
            ->scalar('public_summary')
            ->notEmptyString('public_summary', 'O resumo público é obrigatório!'); */

        $validator
            ->integer('access_quantity')
            ->notEmptyString('access_quantity');

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
        $rules->add($rules->existsIn(['robots_id'], 'Robots'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['situations_id'], 'Situations'));
        $rules->add($rules->existsIn(['articles_types_id'], 'ArticlesTypes'));
        $rules->add($rules->existsIn(['articles_categories_id'], 'ArticlesCategories'));

        return $rules;
    }
    public function getVerArtigo($slug){
        $query = $this->find()
                    ->select(['id', 'tittle', 'content', 'users_id','created','Users.name'])
                    ->contain(['Users'])
                    ->where(['Articles.slug ='=>$slug, 'Articles.situations_id ='=>2]);//faz o artigo aparecer só se estiver ativo
        return $query->first();
    }
    public function getArtigoAnt($id){
        $query = $this->find()
                    ->select(['slug','situations_id'])
                    ->where(['Articles.id <'=>$id])
                    ->order(['Articles.id'=>'DESC']);
        return $query->first();
    }
    public function getArtigoProx($id){
        $query = $this->find()
                    ->select(['slug', 'situations_id'])
                    ->where(['Articles.id >'=>$id])
                    ->order(['Articles.id'=>'ASC']);
        return $query->first();
    }
    public function getArtigoUlts(){
        $query = $this->find()
                    ->select(['tittle','situations_id','slug'])
                    ->order(['Articles.id'=>'DESC'])
                    ->limit(5);
        return $query;
    }
    public function getArtigoDestaq(){
        $query = $this->find()
                    ->select(['tittle','slug', 'situations_id'])
                    ->order(['Articles.access_quantity'=>'DESC'])
                    ->limit(5);
        return $query;
    }
    public function getVerSobAutor(){
        $query = $this->find()
                    ->select(['tittle', 'description', 'situations_id'])
                    ->where(['AutorsSobs.id ='=> 1]);
        return $query->first();
    }
    public function getListarArticlesHome(){
        $query = $this->find()
                    ->select(['id','tittle', 'description_article', 'content','image','slug','situations_id', 'modified'])
                    ->order(['Articles.id'=> 'DESC'])
                    ->limit(3);
        return $query;
    }
}
