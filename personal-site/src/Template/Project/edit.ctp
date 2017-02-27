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
        ['action' => 'delete', $project->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Project'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $project->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Project'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($project); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Project']) ?></legend>
    <?php
    echo $this->Form->input('title');
    echo $this->Form->input('description');
    echo $this->Form->input('image');
    echo $this->Form->input('published');
    echo $this->Form->input('banner');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
