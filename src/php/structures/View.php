<?php

namespace tranber\structures;

use tranber\functions as fn;

// "abstract" rend impossible l'instanciation de la classe
// cette classe est donc faite pour être héritée

abstract class View implements ViewInterface
{
	protected $template;

	protected function getTemplate() :?string
	{
		return $this->template;
	}

	protected function setTemplate(string $template) :ViewInterface
	{
		$this->template = $template;
		return $this;
	}

	public function stringify() 
	{
		if ($template = $this->getTemplate())
		{
			$path = '../src/php/templates/'.$template.'.php';
			echo fn\parseTemplate($path);
		}
	}

}