<?php

class CitaForm extends BaseCitaForm
{
  public function configure()
  {
    parent::configure();

    $this->setValidator('motivo', new sfValidatorString(array(
      'min_length' => 5,
      'max_length' => 120,
    ), array(
      'required'    => 'motivo obligatorio',
      'min_length'  => 'El motivo debe tener al menos %min_length% caracteres',
      'max_length'  => 'El motivo no puede superar %max_length% caracteres',
    )));

    // Fecha obligatoria, no puede ser en el pasado
    $this->setValidator('fecha', new sfValidatorDate(array(
      'required' => true,
      'min'      => date('Y-m-d'),
    ), array(
      'required' => 'La fecha de la cita es obligatoria',
      'min'      => 'La fecha de la cita no puede ser en el pasado',
      'invalid'  => 'La fecha no es valida',
    )));

    // Hora obligatoria
    $this->setValidator('hora', new sfValidatorTime(array(
      'required' => true,
    ), array(
      'required' => 'La hora de la cita es obligatoria',
      'invalid'  => 'La hora no es valida',
    )));
    // Estado: select con opciones fijas
    $this->widgetSchema['estado'] = new sfWidgetFormChoice(array(
      'choices' => array(
        'pendiente'  => 'Pendiente',
        'confirmada' => 'Confirmada',
        'cancelada'  => 'Cancelada',
        'completada' => 'Completada',
        ),
    ));
    $this->setValidator('estado', new sfValidatorChoice(array(
      'choices'  => array('pendiente', 'confirmada', 'cancelada', 'completada'),
      'required' => true,
      ), array(
        'required' => 'Debes seleccionar un estado',
        'invalid'  => 'El estado seleccionado no es valido',
    )));
  }
}