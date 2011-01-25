<li>
<?php if($task->getIsImportant()) echo '<strong>';?>
    <?php if($task->getIsUrgent()) echo '<em>';?>
        <?php echo $task->getName(); ?>
    <?php if($task->getIsUrgent()) echo '</em>';?>
<?php if($task->getIsImportant()) echo '</strong>';?>
<?php echo link_to('Edit', 'taskmanager/edit?id=' . $id, array('id'=>'edit_button_' . $id)); ?> 
<?php echo link_to('Delete', 'taskmanager/delete?id=' . $id, array('id'=>'delete_button_' . $id)); ?></li>