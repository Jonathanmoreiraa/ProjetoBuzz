<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Carousel Entity
 *
 * @property int $id
 * @property string $name_carousel
 * @property string $image
 * @property string|null $tittle
 * @property string|null $description
 * @property string|null $tittle_button
 * @property string|null $link
 * @property int $ordem
 * @property int $positions_id
 * @property int $colors_id
 * @property int $situations_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\Color $color
 * @property \App\Model\Entity\Situation $situation
 */
class Carousel extends Entity
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
        'name_carousel' => true,
        'image' => true,
        'tittle' => true,
        'description' => true,
        'tittle_button' => true,
        'link' => true,
        'ordem' => true,
        'positions_id' => true,
        'colors_id' => true,
        'situations_id' => true,
        'created' => true,
        'modified' => true,
        'position' => true,
        'color' => true,
        'situation' => true,
    ];
}
