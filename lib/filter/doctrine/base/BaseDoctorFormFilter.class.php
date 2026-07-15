<?php

/**
 * Doctor filter form base class.
 *
 * @package    reto_symfony
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDoctorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'especialidad' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'     => new sfWidgetFormFilterInput(),
      'email'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'       => new sfValidatorPass(array('required' => false)),
      'apellido'     => new sfValidatorPass(array('required' => false)),
      'especialidad' => new sfValidatorPass(array('required' => false)),
      'telefono'     => new sfValidatorPass(array('required' => false)),
      'email'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('doctor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Doctor';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'nombre'       => 'Text',
      'apellido'     => 'Text',
      'especialidad' => 'Text',
      'telefono'     => 'Text',
      'email'        => 'Text',
    );
  }
}
