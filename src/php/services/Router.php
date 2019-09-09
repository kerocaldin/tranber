<?php

namespace tranber\services;

use tranber\controllers\NotFound;
use tranber\structures\Service;

class Router extends Service implements RouterInterface
{
	protected $app;

	protected $path = '/';

	public static function getInstance(AppInterface $app)
	{
		return self::getSingletonInstance(self::class, [$app]);
	}

	protected function __construct(AppInterface $app)
	{
		$this->app = $app;
		if ($_GET['path'] ?? null)
			$this->path = $_GET['path'];
	}

	public function getPath()
	{
		return $path;
	}

	public function getController()
	{
		$data = $this->app->getConf()->getData();
		$routes = $data['routes'] ?? [];
		if (array_key_exists($this->path, $routes)) {
			return new $routes[$this->path]($this->app);
		}
		else {
			return new NotFound($this->app);
		}
	}
}