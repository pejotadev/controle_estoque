<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subtype $subtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subtype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subtype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Subtypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subtypes form large-9 medium-8 columns content">
    <?= $this->Form->create($subtype) ?>
    <fieldset>
        <legend><?= __('Edit Subtype') ?></legend>
        <?php
            echo $this->Form->control('subtype');
            echo $this->Form->control('types_id', ['options' => $types]);
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
