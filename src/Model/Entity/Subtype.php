<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subtype Entity
 *
 * @property int $id
 * @property string $subtype
 * @property int $types_id
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 * @property int $users_id
 * @property bool $status
 *
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\User $user
 */
class Subtype extends Entity
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
        'subtype' => true,
        'types_id' => true,
        'modified' => true,
        'created' => true,
        'users_id' => true,
        'status' => true,
        'type' => true,
        'user' => true,
    ];
}
