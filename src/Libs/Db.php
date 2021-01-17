<?php
namespace Libs;
use PDO;


class Db {
	public $pdo;
	private static $instanceCount = 0;
	private static $instance;
	
	private function __construct()
	{self::$instanceCount++;
		
		extract( (require __DIR__ . '/../settings.php')['db'] );
		$this->pdo = new PDO("mysql:host=$host;dbname=$name", $user, $password);
	}
	public function query(string $sql, array $params = [], string $className = 'stdClass') {
		$sth = $this->pdo->prepare($sql);
		$result = $sth->execute($params);
		if($result == false) return null;
		return $sth->fetchAll(PDO::FETCH_CLASS, $className); // резултат будет возвращаться в виде объектов класса
	}
	public static function getInstanceCount()
	{
		return self::$instanceCount;
	}

	public static function getInstance()
	{
		if(self::$instance == null) {
			self::$instance = new self();
			/*тоже самое self::$instance = new Db();*/
		}
			return self::$instance;
		
	}
	
}