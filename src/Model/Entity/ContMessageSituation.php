<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContMessageSituation Entity
 *
 * @property int $id
 * @property string $name_message_situation
 * @property int $colors_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Color $color
 * @property \App\Model\Entity\ContactMessage[] $contact_messages
 */
class ContMessageSituation extends Entity
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
        'name_message_situation' => true,
        'colors_id' => true,
        'created' => true,
        'modified' => true,
        'color' => true,
        'contact_messages' => true,
    ];
}
