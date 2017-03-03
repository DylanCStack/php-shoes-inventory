<?php
    class Brand
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
            $GLOBALS['DB']->exec("INSERT INTO brands (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update($new_name)
        {
            $this->setName($new_name);

            $GLOBALS["DB"]->exec("UPDATE brands SET name = '{$this->getName()}' WHERE id = {$this->getId()};");
        }

        static function find($id)
        {
            $returned_brand = $GLOBALS['DB']->query("SELECT * FROM brands WHERE id={$id};");
            return $returned_brand->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Brand", ['name', 'id'])[0];

        }

        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");

            return $returned_brands->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Brand", ['name', 'id']);
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM brands;");
        }
    }
?>
