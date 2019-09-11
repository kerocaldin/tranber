<?php

namespace tranber\views;

use tranber\structures\View;

class NotFound extends View
{
	public function __construct()
	{
		$this->setTemplate('HtmlHeader');
		$this->setTemplate('Navbar');
		$this->setTemplate('NotFound');
		$this->setTemplate('HtmlFooter');
	}
}