<?php

namespace tranber\structures;

use tranber\services\AppInterface;

// "abstract" rend impossible l'instanciation de la classe
// cette classe est donc faite pour être héritée

abstract class Controller implements ControllerInterface
{
	protected $app;

	public function __construct(AppInterface $app)
	{
		$this->setApp($app);
	}

	public function setApp(AppInterface $app) :ControllerInterface
	{
		$this->app = $app;
		return $this;
	}

	public function getApp() :AppInterface
	{
		return $this->app;
	}
 
}