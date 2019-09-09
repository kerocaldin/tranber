<?php

namespace tranber\structures;

use tranber\services\AppInterface;

// "abstract" rend impossible l'instanciation de la classe
// cette classe est donc faite pour être héritée

abstract class Model implements ModelInterface
{
	protected $app;

	public function __construct(AppInterface $app)
	{
		$this->setApp($app);
	}

	public function getApp() :AppInterface
	{
		return $this->app;
	}

	public function setApp(AppInterface $app) :ModelInterface
	{
		$this->app = $app;
		return $this;
	}
}