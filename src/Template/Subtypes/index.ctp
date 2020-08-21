<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subtype[]|\Cake\Collection\CollectionInterface $subtypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Subtype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subtypes index large-9 medium-8 columns content">
    <h3><?= __('Subtypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subtype') ?></th>
                <th scope="col"><?= $this->Paginator->sort('types_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subtypes as $subtype): ?>
            <tr>
                <td><?= $this->Number->format($subtype->id) ?></td>
                <td><?= h($subtype->subtype) ?></td>
                <td><?= $subtype->has('type') ? $this->Html->link($subtype->type->id, ['controller' => 'Types', 'action' => 'view', $subtype->type->id]) : '' ?></td>
                <td><?= h($subtype->modified) ?></td>
                <td><?= h($subtype->created) ?></td>
                <td><?= $subtype->has('user') ? $this->Html->link($subtype->user->name, ['controller' => 'Users', 'action' => 'view', $subtype->user->id]) : '' ?></td>
                <td><?= h($subtype->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subtype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subtype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subtype->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
