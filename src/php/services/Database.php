<?php

namespace tranber\services;

use tranber\structures\Service;

class Database extends Service implements DatabaseInterface
{
	protected $pdo;

	protected function __construct(ConfInterface $conf)
	{
		$data   = $conf->getData();
		$dbConf = $data['database'] ?? [];
		$host   = $dbConf['host']   ?? 'localhost';
		$name   = $dbConf['name']   ?? 'tranber';
		$user   = $dbConf['user']   ?? 'root';
		$pass   = $dbConf['pass']   ?? '';

		$this->pdo = new \PDO('mysql:host='.$host.';dbname='.$name, $user, $pass);
	}

	public static function getInstance(ConfInterface $conf)
	{
		return self::getSingletonInstance(self::class, [$conf]);
	}

	public function query(string $sql, array $data = [], bool $fetch = true)
	{
		try {
			$statement = $this->pdo->prepare($sql);
			$result    = $statement->execute($data);
			// si $fetch vaut true on retourne le résultat de fetchAll()
			// sinon on retourne le résultat de execute() :
			return $fetch ? $statement->fetchAll(\PDO::FETCH_ASSOC) : $result;
		}
		catch(Exception $e) {
			echo $e->getMessage().' in '.$e->getFile().', l.'.$e->getLine();
			die;
		}
	}
}