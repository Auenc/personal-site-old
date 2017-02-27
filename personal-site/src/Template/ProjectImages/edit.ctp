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
        ['action' => 'delete', $projectImage->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $projectImage->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Project Images'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $projectImage->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $projectImage->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Project Images'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($projectImage); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Project Image']) ?></legend>
    <?php
    echo $this->Form->input('project-id');
    echo $this->Form->input('path');
    echo $this->Form->input('banner');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
