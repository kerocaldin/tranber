<?php

namespace tranber\structures;

use tranber\functions as fn;

// "abstract" rend impossible l'instanciation de la classe
// cette classe est donc faite pour être héritée

abstract class View implements ViewInterface
{
	protected $templates = [];

	protected function getTemplates() :?iterable
	{
		return $this->templates;
	}

	protected function setTemplate(string $name, iterable $vars = []) :ViewInterface
	{
		$this->templates[$name] = $vars;
		return $this;
	}

	public function stringify() 
	{
		foreach ($this->getTemplates() as $name => $vars)
		{
			$path = '../src/php/templates/'.$name.'.php';
			echo fn\parseTemplate($path, $vars);
		}
	}

}