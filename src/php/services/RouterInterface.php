<?php

namespace tranber\services;

interface RouterInterface
{
	// public function __construct($conf);

	public function getPath();

	public function getController();
}