<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property string $tittle
 * @property string $description_article
 * @property string $content
 * @property string $image
 * @property string $slug
 * @property string $keywords
 * @property string $description
 * @property string $public_summary
 * @property int $access_quantity
 * @property int $robots_id
 * @property int $users_id
 * @property int $situations_id
 * @property int $articles_types_id
 * @property int $articles_categories_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Robot $robot
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Situation $situation
 * @property \App\Model\Entity\ArticlesType $articles_type
 * @property \App\Model\Entity\ArticlesCategory $articles_category
 */
class Article extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'tittle' => true,
        'description_article' => true,
        'content' => true,
        'image' => true,
        'slug' => true,
        'keywords' => true,
        'description' => true,
        'public_summary' => true,
        'access_quantity' => true,
        'robots_id' => true,
        'users_id' => true,
        'situations_id' => true,
        'articles_types_id' => true,
        'articles_categories_id' => true,
        'created' => true,
        'modified' => true,
        'robot' => true,
        'user' => true,
        'situation' => true,
        'articles_type' => true,
        'articles_category' => true,
    ];
}
