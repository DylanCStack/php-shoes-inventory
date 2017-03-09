<?php
    class Store
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;

        }

        function getName()
        {
            return $this->name;
        }
        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stores (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->getId()}");
            $GLOBALS['DB']->exec("DELETE FROM brands_stores WHERE store_id = {$this->getId()}");
        }

        function update($new_name)
        {
            $this->setName($new_name);

            $GLOBALS["DB"]->exec("UPDATE stores SET name = '{$this->getName()}' WHERE id = {$this->getId()};");
        }

        function addBrand($id)
        {
            $GLOBALS['DB']->exec("INSERT INTO brands_stores (brand_id, store_id) VALUES ({$id}, {$this->getId()});");
        }

        function getBrands()
        {
            $returned_brands = $GLOBALS['DB']->query(
            "SELECT brands.* FROM stores
            JOIN brands_stores ON (brands_stores.store_id = stores.id)
            JOIN brands ON (brands.id = brands_stores.brand_id)
            WHERE stores.id = {$this->getId()};");

            return $returned_brands->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Brand", ['name', 'id']);
        }

        static function find($id)
        {
            $returned_store = $GLOBALS['DB']->query("SELECT * FROM stores WHERE id={$id};");
            return $returned_store->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Store", ['name', 'id'])[0];

        }

        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");

            if($returned_stores){
                return $returned_stores->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Store", ['name', 'id']);

            } else {
                return [];
            }
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores;");
            $GLOBALS['DB']->exec("DELETE FROM brands_stores;");
        }
    }
?>
