<?php

namespace tranber\structures;

use tranber\services\AppInterface;

interface ControllerInterface
{
	public function __construct(AppInterface $app);

	public function setApp(AppInterface $app) :ControllerInterface;

	public function getApp() :AppInterface;
}