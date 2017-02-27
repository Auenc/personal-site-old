<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?> </li>
<li><?= $this->Html->link(__('List Project'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?> </li>
<li><?= $this->Html->link(__('List Project'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($project->title) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Title') ?></td>
            <td><?= h($project->title) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($project->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Published') ?></td>
            <td><?= $project->published ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= $this->Text->autoParagraph(h($project->description)); ?></td>
        </tr>
    </table>
</div>

