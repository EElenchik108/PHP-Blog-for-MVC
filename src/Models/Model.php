<?php
namespace Models;
use Libs\Db;

abstract class Model {
	abstract public static function getTableName();

	public static function all() {
	$db = Db::getInstance();
	/*$db = new \Libs\Db();*/
	return $db->query('SELECT * FROM ' . static::getTableName(), [], static::class);
}
public static function getById($id)
{
	$db = Db::getInstance();
	
	$result = $db->query('SELECT * FROM ' . static::getTableName() . ' WHERE id=?', [$id], static::class );
	return $result ? $result[0] : null;
}

public function save()
{
	$reflection = new \ReflectionObject($this);
	$properties = $reflection->getProperties();
	$placeholders = [];
	$params = [];
	$propertiesAdd = []; //хранит все свойства
	$propertiesAddPlaceholders = []; //хранит все свойсвта с :name :text

	foreach ($properties as $property) {
		$placeholders[] = $property->name . '=:' . $property->name;
		$prop = $property->name;
		$params[$property->name] = $this->$prop;
		$propertiesAdd[] = $property->name;
		$propertiesAddPlaceholders[] = ':' . $property->name;
	}
	if( $this->id ){ //if( $this->getId() )
	$sql = 'UPDATE ' . static::getTableName(). '  SET ' . implode(', ', $placeholders) . ' WHERE id=:id';	
	}
	else {		
		$sql = 'INSERT INTO ' . static::getTableName() . ' (' . implode(', ', $propertiesAdd) . ') VALUES (' . implode(',', $propertiesAddPlaceholders) . ')';
		/*print_r($sql);
		echo '<pre> '. print_r($sql, true) . '</pre>';*/
	}
	$db = Db::getInstance();
	$db->query($sql, $params);
	/*echo '<pre> '. print_r($properties, true) . '</pre>';*/
	static::setId($db->pdo->lastInsertId());

}
public static function findOneByColumn(string $column, $value)
{
	$db = Db::getInstance();
	$result = $db->query('SELECT * FROM ' . static::getTableName() . ' WHERE ' . $column . '=?' , [$value], static::class);
	if( !$result ) {return null;}
	return $result[0];
}

public function delete()
{	
	$db = Db::getInstance();
	$sql = 'DELETE FROM ' . static::getTableName() . ' WHERE id=?' ;	
	$db->query($sql, [$this->id]);	
}
}

/*CRUD - считывание данных, удаление, редактирование (обновление данных)*/