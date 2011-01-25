<h2>Delete Task</h2>
<?php echo form_tag(url_for('taskmanager/delete?id=' . $task->getTaskId())); ?>
<li><p>Are you sure you want to delete this task?</p></li>
<li><input type="submit" value="Cancel" /></li>
<li><input name="delete_button" type="submit" value="Delete Task" /></li>
</form>
