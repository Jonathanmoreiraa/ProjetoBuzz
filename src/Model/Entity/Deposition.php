<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deposition Entity
 *
 * @property int $id
 * @property string $name_dep
 * @property string $description_dep
 * @property string $video_one
 * @property string $video_two
 * @property string $video_three
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Deposition extends Entity
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
        'name_dep' => true,
        'description_dep' => true,
        'video_one' => true,
        'video_two' => true,
        'video_three' => true,
        'created' => true,
        'modified' => true,
    ];
}
