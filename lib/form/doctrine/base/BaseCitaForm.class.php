<?php

/**
 * Cita form base class.
 *
 * @method Cita getObject() Returns the current form's model object
 *
 * @package    reto_symfony
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCitaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'paciente_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'), 'add_empty' => false)),
      'doctor_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Doctor'), 'add_empty' => false)),
      'fecha'       => new sfWidgetFormDate(),
      'hora'        => new sfWidgetFormTime(),
      'motivo'      => new sfWidgetFormInputText(),
      'estado'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'paciente_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'))),
      'doctor_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Doctor'))),
      'fecha'       => new sfValidatorDate(),
      'hora'        => new sfValidatorTime(),
      'motivo'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'estado'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cita[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cita';
  }

}
