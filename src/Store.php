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
        }

        function update($new_name)
        {
            $this->setName($new_name);

            $GLOBALS["DB"]->exec("UPDATE stores SET name = '{$this->getName()}' WHERE id = {$this->getId()};");
        }

        static function find($id)
        {
            $returned_store = $GLOBALS['DB']->query("SELECT * FROM stores WHERE id={$id};");
            return $returned_store->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Store", ['name', 'id'])[0];

        }

        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");

            return $returned_stores->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Store", ['name', 'id']);
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores;");
        }
    }
?>
