<?php

namespace tranber\controllers;

use tranber\structures\Controller;
use tranber\views\Home as HomeView;

class Home extends Controller implements HomeInterface
{
	public function run()
	{
		$view = new HomeView;
		$view->stringify();
	}
}