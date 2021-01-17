<?php
namespace Models;

class Post extends Model{
	protected $id;
	protected $name;
	protected $text;
	protected $author_id;
	protected $created_at;


public function getId()
{
	return $this->id;
}

public function getText()
{
	return $this->text;
}

public function getAuthorId()
{
	return $this->author_id;
}

public function getCreatedAt()
{
	return $this->created_at;
}

public function getName()
{
	return $this->name;
}

public function getAuthor()
{
	return User::getById($this->author_id);
}

public function setId()
{
	$this->name = $id;
} 

public function setName(string $value)
{
	$this->name = $value;
}

public function setAuthorId(int $value)
{
	$this->author_id = $value;
}

public function setText(string $value)
{
	$this->text = $value;
}

public function setCreatedAt()
{
	$this->created_at = date('Y-m-d H:i:s');
}

public function setTableName()
{
	return 'posts';
}

public static function getTableName()
{
	return 'posts';

}


}