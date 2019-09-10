<?php

namespace tranber\views;

use tranber\structures\View;

class Home extends View
{
	public function __construct()
	{
		$this->setTemplate('HtmlHeader');
		$this->setTemplate('Home');
		$this->setTemplate('HtmlFooter');
	}
}