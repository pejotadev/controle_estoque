<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $product
 * @property int $subtypes_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $users_id
 * @property bool $status
 *
 * @property \App\Model\Entity\Subtype $subtype
 * @property \App\Model\Entity\User $user
 */
class Product extends Entity
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
        'product' => true,
        'subtypes_id' => true,
        'created' => true,
        'modified' => true,
        'users_id' => true,
        'status' => true,
        'subtype' => true,
        'user' => true,
    ];
}
