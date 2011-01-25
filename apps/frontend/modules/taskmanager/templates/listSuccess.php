<?php $id_array = array(); ?>

<h2>First Quadrant (Important & Urgent)</h2>
<?php if(count($first_quad)) echo '<ul>'; ?>
    <?php
    foreach($first_quad as $task):
        $id = $task->getTaskId();
        $id_array[] = $id;
    ?>
        <?php include_partial('task', array('task'=>$task, 'id'=>$id)); ?>
    <?php endforeach; ?>
<?php if(count($first_quad)) echo '</ul>'; ?>



<h2>Second Quadrant (Important)</h2>
<?php if(count($second_quad)) echo '<ul>'; ?>
    <?php
    foreach($second_quad as $task):
        $id = $task->getTaskId();
        $id_array[] = $id;
    ?>
        <?php include_partial('task', array('task'=>$task, 'id'=>$id)); ?>
    <?php endforeach; ?>
<?php if(count($second_quad)) echo '</ul>'; ?>


<h2>Third Quadrant (Urgent)</h2>
<?php if(count($third_quad)) echo '<ul>'; ?>
    <?php
    foreach($third_quad as $task):
        $id = $task->getTaskId();
        $id_array[] = $id;
    ?>
        <?php include_partial('task', array('task'=>$task, 'id'=>$id)); ?>
    <?php endforeach; ?>
<?php if(count($third_quad)) echo '</ul>'; ?>


<h2>Fourth Quadrant</h2>
<?php if(count($fourth_quad)) echo '<ul>'; ?>
    <?php
    foreach($fourth_quad as $task):
        $id = $task->getTaskId();
        $id_array[] = $id;
    ?>
        <?php include_partial('task', array('task'=>$task, 'id'=>$id)); ?>
    <?php endforeach; ?>
<?php if(count($fourth_quad)) echo '</ul>'; ?>


<?php echo link_to('Add Task', 'taskmanager/add', array('id'=>'add_button')); ?>
        
<script type="text/javascript">
    $(document).ready(function() {
        $("a#add_button").fancybox();
        <?php foreach($id_array as $id) { ?>
        $("a#edit_button_<?php echo $id; ?>").fancybox();
        $("a#delete_button_<?php echo $id; ?>").fancybox();
        <?php } ?>
    });
</script>