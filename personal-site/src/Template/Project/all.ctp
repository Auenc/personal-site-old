<?php
/* @var $this \Cake\View\View */


?>

<h2 class="pull-left">All Projects</h2>
<br class="clear" />
<div class="row no-space projects">
  <?php foreach($project as $project): ?>
   <div class="col-sm-4 col-md-3 ">
    <img src="/img/projects/<?= $project->image?>.screen.png" alt="" class="img-responsive center-block">
    <a class="project-title" href="/project/view/<?= $project->id ?>"><h4 class="center"><?= $project->title?></h4></a>
  </div>
<?php endforeach; ?>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
