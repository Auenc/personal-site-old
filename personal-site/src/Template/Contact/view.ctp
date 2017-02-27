<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?> </li>
<li><?= $this->Html->link(__('List Contact'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contact'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?> </li>
<li><?= $this->Html->link(__('List Contact'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contact'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($contact->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Email') ?></td>
            <td><?= h($contact->email) ?></td>
        </tr>
        <tr>
            <td><?= __('Firstname') ?></td>
            <td><?= h($contact->firstname) ?></td>
        </tr>
        <tr>
            <td><?= __('Lastname') ?></td>
            <td><?= h($contact->lastname) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($contact->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Message') ?></td>
            <td><?= $this->Text->autoParagraph(h($contact->message)); ?></td>
        </tr>
    </table>
</div>

