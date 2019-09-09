<?php

namespace tranber\services;

use tranber\structures\Service;

class Conf extends Service implements ConfInterface
{
	protected $data = [];

	public static function getInstance(array $data)
	{
		return self::getSingletonInstance(self::class, [$data]);
	}

	protected function __construct(array $data)
	{
		$this->data = $data;
	}

	public function getData() :array
	{
		return $this->data;
	}
}