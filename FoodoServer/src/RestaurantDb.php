<?php

class RestaurantDb {
	
	private $pdo;
	
	public function __construct() {	
		$this->pdo = new FoodoPDO();
	}
	
	public function createTable() {
		
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