<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity
 *
 * @property int $id
 * @property string $tittle_ser
 * @property string $icon_one
 * @property string $tittle_one
 * @property string $description_one
 * @property string $icon_two
 * @property string $tittle_two
 * @property string $description_two
 * @property string $icon_three
 * @property string $tittle_three
 * @property string $description_three
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Service extends Entity
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
        'tittle_ser' => true,
        'icon_one' => true,
        'tittle_one' => true,
        'description_one' => true,
        'icon_two' => true,
        'tittle_two' => true,
        'description_two' => true,
        'icon_three' => true,
        'tittle_three' => true,
        'description_three' => true,
        'created' => true,
        'modified' => true,
    ];
}
