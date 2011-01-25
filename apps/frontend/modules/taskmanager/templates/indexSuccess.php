<?php

use_stylesheet('taskmatrix');
$id_array = array(); ?>

<table>
    <tr>
        <td class="no_borders">

        </td>
        <td class="no_borders top_left_metric">
            Urgent
        </td>
        <td class="no_borders top_right_metric">
            Not Urgent
        </td>
    </tr>
    <tr>
        <td class="no_borders left_top_metric">
            Important
        </td>
        <td><!-- FIRST QUADRANT -->

            <div class="quadrant">
            <div class="quad_indicator">I</div>

            <?php if(count($first_quad)) echo '<ul>'; ?>
                <?php
                foreach($first_quad as $task):
                    $id = $task->getTaskId();
                    $id_array[] = $id;
                ?>
                    <?php include_partial('task', array('task'=>$task, 'id'=>$id)); ?>
                <?php endforeach; ?>
            <?php if(count($first_quad)) echo '</ul>'; ?>

            </div>
        </td>
        <td><!-- SECOND QUADRANT -->
            <div class="quadrant">
            <div class="quad_indicator">II</div>

            <?php if(count($second_quad)) echo '<ul>'; ?>
                <?php
                foreach($second_quad as $task):
                    $id = $task->getTaskId();
                    $id_array[] = $id;
                ?>
                    <?php include_partial('task', array('task'=>$task, 'id'=>$id)); ?>
                <?php endforeach; ?>
            <?php if(count($second_quad)) echo '</ul>'; ?>

            </div>
        </td>
    </tr>
    <tr>
        <td class="no_borders left_bottom_metric">
            Not Important
        </td>
        <td><!-- THIRD QUADRANT -->

            <div class="quadrant">
            <div class="quad_indicator">III</div>

            <?php if(count($third_quad)) echo '<ul>'; ?>
                <?php
                foreach($third_quad as $task):
                    $id = $task->getTaskId();
                    $id_array[] = $id;
                ?>
                    <?php include_partial('task', array('task'=>$task, 'id'=>$id)); ?>
                <?php endforeach; ?>
            <?php if(count($third_quad)) echo '</ul>'; ?>

            </div>
        </td>
        <td><!-- FOURTH QUADRANT -->

            <div class="quadrant">
            <div class="quad_indicator">IV</div>

            <?php if(count($fourth_quad)) echo '<ul>'; ?>
                <?php
                foreach($fourth_quad as $task):
                    $id = $task->getTaskId();
                    $id_array[] = $id;
                ?>
                    <?php include_partial('task', array('task'=>$task, 'id'=>$id)); ?>
                <?php endforeach; ?>
            <?php if(count($fourth_quad)) echo '</ul>'; ?>

            </div>
        </td>
    </tr>
</table>


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