<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $contact->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Contact'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $contact->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Contact'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($contact); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Contact']) ?></legend>
    <?php
    echo $this->Form->input('email');
    echo $this->Form->input('firstname');
    echo $this->Form->input('lastname');
    echo $this->Form->input('message');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
