<?php

namespace tranber\views;

use tranber\structures\View;

class Home extends View
{
	public function __construct()
	{
		$this->setTemplate('Home');
	}
}