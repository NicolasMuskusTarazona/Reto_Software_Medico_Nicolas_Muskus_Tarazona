<?php

class PacienteForm extends BasePacienteForm
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
    // Documento obligatorio, number
    $this->setValidator('documento', new sfValidatorRegex(array(
    // Valor solo numeros, minimo 6 digitos y maximo 15
      'pattern' => '/^\d{6,15}$/',
    ), array(
      'invalid'  => 'El documento debe contener solo numeros (6 a 15 digitos)',
      'required' => 'documento obligatorio',
    )));

    // Correo  opcional, debe ser valido
    $this->setValidator('correo', new sfValidatorEmail(array(
      'required' => false,
    ), array(
      'invalid' => 'El correo no tiene un formato valido',
    )));

    // Fecha de nacimiento
    $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormDate(array(
      'years' => array_combine(
        range(date('Y'), date('Y') - 100),
        range(date('Y'), date('Y') - 100)
      ),
      'format' => '%day%/%month%/%year%',
    ));

    // Fecha de nacimiento no puede ser futura
    $this->setValidator('fecha_nacimiento', new sfValidatorDate(array(
      'max' => date('Y-m-d'),
    ), array(
      'max'      => 'La fecha de nacimiento no puede ser futura',
      'required' => 'La fecha de nacimiento es obligatoria',
    )));

    // Telefono opcional, solo numeros
    $this->setValidator('telefono', new sfValidatorRegex(array(
      // Valor solo numeros, minimo 7 digitos y maximo 10
      'pattern' => '/^\d{7,10}$/',
      'required' => false,
    ), array(
      'invalid' => 'El telefono debe tener solo numeros (7 a 10 digitos)',
    )));
  }
}