<?php
/**
  * @var \App\View\AppView $this
  */
?>


<?= $this->Form->create($contact); ?>
<fieldset>
    <legend><?= __('Leave a message') ?></legend>
    <?php
    echo $this->Form->input('email');
    echo $this->Form->input('firstname');
    echo $this->Form->input('lastname');
    echo $this->Form->input('message');
    ?>
</fieldset>
<?= $this->Form->button(__("Send")); ?>
<?= $this->Form->end() ?>
