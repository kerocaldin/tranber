<?php

namespace tranber\services;

use tranber\services\Router;
use tranber\structures\Service;
use tranber\structures\ModelInterface;

class App extends Service implements AppInterface
{
	protected $conf;
	protected $router;
	protected $database;

	protected $models = [];

	public static function getInstance(ConfInterface $conf)
	{
		return self::getSingletonInstance(self::class, [$conf]);
	}

	protected function __construct(ConfInterface $conf)
	{
		$this->conf     = $conf;
		$this->router   = Router::getInstance($this);
		$this->database = Database::getInstance($conf);
	}

	public function getModel(string $name) :?ModelInterface
	{
		$class = 'tranber\models\\'.$name;
		if (!array_key_exists($name, $this->models) && class_exists($class))
		{
			$this->models[$name] = new $class($this);
		}

		return $this->models[$name] ?? null;
	}

	public function getDatabase() :DatabaseInterface
	{
		return $this->database;
	}

	public function getRouter() :RouterInterface
	{
		return $this->router;
	}

	public function getConf() :ConfInterface
	{
		return $this->conf;
	}

	public function run()
	{
		$controller = $this->router->getController();
		$controller->run();
	}
}