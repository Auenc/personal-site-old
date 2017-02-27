<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Image'), ['action' => 'edit', $image->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?> </li>
<li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Image'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Image'), ['action' => 'edit', $image->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?> </li>
<li><?= $this->Html->link(__('List Images'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Image'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($image->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Path') ?></td>
            <td><?= h($image->path) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($image->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Project-id') ?></td>
            <td><?= $this->Number->format($image->project-id) ?></td>
        </tr>
        <tr>
            <td><?= __('Banner') ?></td>
            <td><?= $image->banner ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

