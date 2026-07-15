<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();
// Implementar el plugin 
class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup(){
    $this->enablePlugins('sfDoctrinePlugin', 'sfDoctrineGuardPlugin');
  }
}
