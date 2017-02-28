<?php
$this->assign("title", $project->title . " | Lewis Campbell");
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
