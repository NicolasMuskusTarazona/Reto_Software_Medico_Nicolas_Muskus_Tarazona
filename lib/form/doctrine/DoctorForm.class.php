<?php

class DoctorForm extends BaseDoctorForm
{
  public function configure()
  {
    parent::configure();

    // Nombre obligatorio,txt 
    $this->setValidator('nombre', new sfValidatorString(array(
      'min_length' => 3,
      'max_length' => 60,
    ), array(
      'required'    => 'nombre obligatorio',
      'min_length'  => 'El nombre debe tener al menos %min_length% caracteres',
      'max_length'  => 'El nombre no puede superar %max_length% caracteres',
    )));

    $this->setValidator('apellido', new sfValidatorString(array(
      'min_length' => 3,
      'max_length' => 60,
    ), array(
      'required'    => 'apellido obligatorio',
      'min_length'  => 'El apellido debe tener al menos %min_length% caracteres',
      'max_length'  => 'El apellido no puede superar %max_length% caracteres',
    )));

    $this->setValidator('especialidad', new sfValidatorString(array(
      'min_length' => 7,
      'max_length' => 60,
    ), array(
      'required'    => 'especialidad obligatoria',
      'min_length'  => 'La especialidad debe tener al menos %min_length% caracteres',
      'max_length'  => 'La especialidad no puede superar %max_length% caracteres',
    )));

    // Telefono opcional, solo numeros
    $this->setValidator('telefono', new sfValidatorRegex(array(
      // Valor solo numeros, minimo 7 digitos y maximo 10
      'pattern' => '/^\d{7,10}$/',
      'required' => false,
    ), array(
      'invalid' => 'El telefono debe tener solo numeros (7 a 10 digitos)',
    )));

    // Correo  opcional, debe ser valido
    $this->setValidator('correo', new sfValidatorEmail(array(
      'required' => false,
    ), array(
      'invalid' => 'El correo no tiene un formato valido',
    )));

  }
}