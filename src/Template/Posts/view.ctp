<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li>
        <?php
            echo $this->Html->link(__('New Comment'), [
                'controller' => 'Comments',
                'action' => 'add',
                $post->id
            ]);
        ?>
        </li>
        <li>
        <?php
            echo $this->Html->link(__('Comments'), [
                'controller' => 'Comments',
                'action' => 'index',
                $post->id
            ]);
        ?>
        </li>
    </ul>
</nav>
<div class="posts view large-9 medium-8 columns content">
    <h3><?= h($post->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($post->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($post->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($post->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Keywords') ?></th>
            <td><?= h($post->meta_keywords) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Description') ?></th>
            <td><?= h($post->meta_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $post->has('user') ? $this->Html->link($post->user->id, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($post->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($post->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($post->body)); ?>
    </div>

    <?php foreach ($post['comments'] as $comment): ?>
        <div class="row">
            <h4><?= __('Comment') ?></h4>
            <em><?= $comment->first_name . ' ' . $comment->last_name; ?> responded: </em>
            <br><br>
            <?= $this->Text->autoParagraph(h($comment->comment)); ?>
        </div>
    <?php endforeach; ?>
</div>
