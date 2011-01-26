<li task_name="<?php echo $task->getName(); ?>">
<?php if($task->getIsUrgent()) echo '<em>';?>
<?php if($task->getIsImportant()) echo '<strong>';?>
    <?php echo $task->getName(); ?>
<?php if($task->getIsImportant()) echo '</strong>';?>
<?php if($task->getIsUrgent()) echo '</em>';?>
<?php echo link_to('Delete', 'taskmanager/delete?id=' . $id, array('class'=>'delete_button')); ?></li>