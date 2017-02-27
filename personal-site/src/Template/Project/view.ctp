<?php

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
<div class="container">
  <div class="row">
    <img src="/webroot/img/projects/<?=$project->image?>.png" class="img-responsive img-rounded project-image center-block" alt="<?= $project->title?>" />
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h2 class="pull-left"><?= $project->title?></h2>
      <br class="clear" />
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <p><?=$project->description?></p>
      <br class="clear" />
    </div>
  </div>
</div>
