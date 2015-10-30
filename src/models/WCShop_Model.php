<?php

Loader::load_library("Database");

class WCShop_Model
{
	public static function get_example()
	{
		$db = (new Database())->connect("wcshop");
		$stmt = $db->prepare("sql");
		$stmt->execute();

		if($stmt->rowCount() > 0)
		{
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		else
		{
			return array();
		}
	}
}
