<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Project'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Project'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($project); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Project']) ?></legend>
    <?php
    echo $this->Form->input('title');
    echo $this->Form->input('description');
    echo $this->Form->input('image');
    echo $this->Form->input('published');
    echo $this->Form->input('banner');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
