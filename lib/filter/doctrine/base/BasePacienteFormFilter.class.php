<?php

/**
 * Paciente filter form base class.
 *
 * @package    reto_symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePacienteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'documento'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'         => new sfWidgetFormFilterInput(),
      'email'            => new sfWidgetFormFilterInput(),
      'fecha_nacimiento' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'nombre'           => new sfValidatorPass(array('required' => false)),
      'apellido'         => new sfValidatorPass(array('required' => false)),
      'documento'        => new sfValidatorPass(array('required' => false)),
      'telefono'         => new sfValidatorPass(array('required' => false)),
      'email'            => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('paciente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Paciente';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nombre'           => 'Text',
      'apellido'         => 'Text',
      'documento'        => 'Text',
      'telefono'         => 'Text',
      'email'            => 'Text',
      'fecha_nacimiento' => 'Date',
    );
  }
}
