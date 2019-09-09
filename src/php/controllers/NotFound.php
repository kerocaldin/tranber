<?php

namespace tranber\controllers;

use tranber\structures\Controller;

class NotFound extends Controller implements NotFoundInterface
{
	public function run()
	{
		echo 'Not Found';
	}	
}