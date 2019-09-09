<?php

namespace tranber\controllers;

use tranber\structures\Controller;

class Home extends Controller implements HomeInterface
{
	public function run()
	{
		echo 'Homepage';
	}
}