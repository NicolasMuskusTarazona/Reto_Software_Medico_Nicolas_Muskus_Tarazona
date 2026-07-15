<?php

/**
 * Paciente form base class.
 *
 * @method Paciente getObject() Returns the current form's model object
 *
 * @package    reto_symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePacienteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre'           => new sfWidgetFormInputText(),
      'apellido'         => new sfWidgetFormInputText(),
      'documento'        => new sfWidgetFormInputText(),
      'telefono'         => new sfWidgetFormInputText(),
      'email'            => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'           => new sfValidatorString(array('max_length' => 100)),
      'apellido'         => new sfValidatorString(array('max_length' => 100)),
      'documento'        => new sfValidatorString(array('max_length' => 20)),
      'telefono'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'email'            => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'fecha_nacimiento' => new sfValidatorDate(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Paciente', 'column' => array('documento')))
    );

    $this->widgetSchema->setNameFormat('paciente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Paciente';
  }

}
