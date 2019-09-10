<?php

namespace tranber\views;

use tranber\structures\View;

class SignUp extends View
{
	public function __construct()
	{
		$this->setTemplate('HtmlHeader');
		$this->setTemplate('SignUp');
		$this->setTemplate('HtmlFooter');
	}
}