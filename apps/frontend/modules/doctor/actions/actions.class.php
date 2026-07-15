<?php

require_once dirname(__FILE__).'/../lib/doctorGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/doctorGeneratorHelper.class.php';


class doctorActions extends autoDoctorActions
{
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $doctor = $this->getRoute()->getObject();

        $cantidadCitas = Doctrine_Core::getTable('Cita')
            ->createQuery('c')
            ->where('c.doctor_id = ?', $doctor->getId())
            ->count();

        if ($cantidadCitas > 0)
        {
            $this->getUser()->setFlash(
                'error',
                'No se puede eliminar el doctor porque tiene citas asociadas'
            );

            $this->redirect('@doctor');
        }

        $doctor->delete();

        $this->getUser()->setFlash(
            'notice',
            'Doctor eliminado correctamente'
        );

        $this->redirect('@doctor');
    }
}