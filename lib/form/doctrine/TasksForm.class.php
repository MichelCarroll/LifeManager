<?php

/**
 * Tasks form.
 *
 * @package    LifeManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TasksForm extends BaseTasksForm
{
  public function configure()
  {
        $this->setWidgets(array(
            'task_id'      => new sfWidgetFormInputHidden(),
            'name'         => new sfWidgetFormInputText(),
            'is_important' => new sfWidgetFormInputCheckbox(),
            'is_urgent'    => new sfWidgetFormInputCheckbox(),
            'due_date'     => new sfWidgetFormDateJQueryUI(array("change_month" => true, "change_year" => true))
        ));
        //http://www.symfony-project.org/plugins/sfJQueryUIPlugin

        $this->widgetSchema->setNameFormat('tasks[%s]');

        $this->widgetSchema->setOption('form_formatter', 'table');

        unset($this['created_at'],$this['updated_at']);
  }
}
