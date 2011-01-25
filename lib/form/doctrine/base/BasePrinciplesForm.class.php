<?php

/**
 * Principles form base class.
 *
 * @method Principles getObject() Returns the current form's model object
 *
 * @package    LifeManager
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePrinciplesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'principle_id' => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'principle_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('principle_id')), 'empty_value' => $this->getObject()->get('principle_id'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('principles[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Principles';
  }

}
