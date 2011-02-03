<?php

/**
 * Tasks form base class.
 *
 * @method Tasks getObject() Returns the current form's model object
 *
 * @package    LifeManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTasksForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'task_id'    => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'time_done'  => new sfWidgetFormDateTime(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'task_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('task_id')), 'empty_value' => $this->getObject()->get('task_id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'time_done'  => new sfValidatorDateTime(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('tasks[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tasks';
  }

}
