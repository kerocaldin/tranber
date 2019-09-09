<?php

namespace tranber\services;

interface AppInterface 
{
	// public function __construct(ConfInterface $conf);

	public function getRouter() :RouterInterface;

	public function getConf() :ConfInterface;

	public function run();
}