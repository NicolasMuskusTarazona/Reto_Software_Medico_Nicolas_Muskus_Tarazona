<?php

require_once dirname(__FILE__).'/../lib/pacientesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/pacientesGeneratorHelper.class.php';

class pacientesActions extends autoPacientesActions
{
    public function executeDelete(sfWebRequest $request){
        $request->checkCSRFProtection();
        $paciente = $this->getRoute()->getObject();
        $cantidadCitas = Doctrine_Core::getTable('Cita')
            ->createQuery('c')
            ->where('c.paciente_id = ?', $paciente->getId())
            ->count();

        if ($cantidadCitas > 0)
        {
            $this->getUser()->setFlash(
                'error',
                'No se puede eliminar el paciente porque tiene citas asociadas.'
            );

            return $this->redirect('@paciente');
        }

        $paciente->delete();

        $this->getUser()->setFlash(
            'notice',
            'Paciente eliminado correctamente.'
        );

        return $this->redirect('@paciente');
    }
}