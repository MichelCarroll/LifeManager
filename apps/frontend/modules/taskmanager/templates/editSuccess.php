<?php include_stylesheets_for_form($form); ?>

<h2>Edit Task</h2>
<?php echo form_tag(url_for('taskmanager/edit?id=' . $task->getTaskId())); ?>
<?php echo $form; ?>
<li><input type="submit" value="Cancel" /></li>
<li><input name="edit_button" type="submit" value="Update Task" /></li>
</form>
