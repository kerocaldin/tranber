<?php

namespace tranber\structures;

use tranber\services\AppInterface;

interface ModelInterface
{
	public function __construct(AppInterface $app);

	public function getApp() :AppInterface;

	public function setApp(AppInterface $app) :ModelInterface;
}