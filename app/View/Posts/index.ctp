<h1>Blog posts</h1>

<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
    ); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],

// When specifying URLs in CakePHP, it is recommended that you use the array format. This is explained in more detail in the section on Routes. Using the array format for URLs allows you to take advantage of CakePHP’s reverse routing capabilities.

array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>