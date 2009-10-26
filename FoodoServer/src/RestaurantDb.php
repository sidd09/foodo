<?php

class RestaurantDb {
	
	private $pdo;
	
	public function __construct() {	
		$this->pdo = new FoodoPDO();
	}
	
	public function createTable() {
		$drop_sql = "DROP TABLE IF EXISTS `restaurants`";
		
		
		$sql = "CREATE TABLE `restaurants` (
		  `id` int(11) NOT NULL default '0',
		  `name` varchar(255) character set latin1 NOT NULL,
		  `description` text character set latin1,
		  `rating` int(11) default NULL,
		  `phone` varchar(32) character set latin1 default NULL,
		  `lat` int(11) default NULL,
		  `lng` int(11) default NULL,
		  `created_at` datetime default NULL
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
		
		$this->pdo->exec($drop_sql);
		$this->pdo->exec($sql);
	}
	
	public function selectAll() {
		$items = array();
		foreach ($this->pdo->query("SELECT * FROM restaurants", PDO::FETCH_ASSOC) as $row) {
			$items[] = $this->createRestaurant($row);
		}
		return $items;
	}
	
	private function createRestaurant($row) {
		$r = new Restaurant();
		
		$r->setId($row['id']);
		$r->setName($row['name']);
		$r->setDescription($row['description']);
		$r->setRating($row['rating']);
		$r->setPhone($row['phone']);
		$r->setLat($row['lat']);
		$r->setLng($row['lng']);
		$r->setCreated($row['created_at']);
		$r->setModified($row['modified_at']);

		return $r;
	}
	
	
}