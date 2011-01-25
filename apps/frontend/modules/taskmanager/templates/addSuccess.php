<?php include_stylesheets_for_form($form); ?>

<h2>Add Task</h2>
<?php echo form_tag('taskmanager/add'); ?>
<?php echo $form; ?>
<li><input type="submit" value="Cancel" /></li>
<li><input name="add_button" type="submit" value="Add Task" /></li>
</form>
