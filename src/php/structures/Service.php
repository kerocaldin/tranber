<?php

namespace tranber\structures;

// "abstract" rend impossible l'instanciation de la classe
// cette classe est donc faite pour être héritée

abstract class Service
{
	protected static $instances = [];

	protected function __construct() { }

	protected static function getSingletonInstance(string $class, array $params = []) :Service
	{
		if (!array_key_exists($class, self::$instances))
			self::$instances[$class] = new $class(... $params);

		return self::$instances[$class];
	}
}