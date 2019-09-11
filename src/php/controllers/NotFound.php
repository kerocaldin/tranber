<?php

namespace tranber\controllers;

use tranber\structures\Controller;
use tranber\views\NotFound as NotFoundView;

class NotFound extends Controller implements NotFoundInterface
{
	public function run()
	{
		$view = new NotFoundView;
		$view->stringify();
	}	
}