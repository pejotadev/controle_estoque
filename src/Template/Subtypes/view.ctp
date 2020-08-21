<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subtype $subtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subtype'), ['action' => 'edit', $subtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subtype'), ['action' => 'delete', $subtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subtype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subtypes view large-9 medium-8 columns content">
    <h3><?= h($subtype->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Subtype') ?></th>
            <td><?= h($subtype->subtype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $subtype->has('type') ? $this->Html->link($subtype->type->id, ['controller' => 'Types', 'action' => 'view', $subtype->type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $subtype->has('user') ? $this->Html->link($subtype->user->name, ['controller' => 'Users', 'action' => 'view', $subtype->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subtype->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($subtype->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($subtype->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $subtype->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
