<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/Brand.php";
    require_once "src/Store.php";


    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }

        function test_save_and_getAll()
        {
            //Arrange
            $name = "Nike";
            $id = null;
            $new_store = new Store($name, $id);

            //Act
            $new_store->save();
            $result = Store::getAll();

            //Assert
            $this->assertEquals([$new_store], $result);
        }

        function test_find()
        {
            //Arrange
            $name = "Nike";
            $id = null;
            $new_store = new Store($name, $id);
            $new_store->save();

            //Act
            $result = Store::find($new_store->getId());

            //Assert
            $this->assertEquals($new_store, $result);
        }

        function test_update()
        {
            //Arrange
            $name = "Nike";
            $id = null;
            $new_store = new Store($name, $id);
            $new_store->save();

            //Act
            $new_name = "Footlocker";
            $new_store->update($new_name);
            //Assert
            $result = Store::find($new_store->getId())->getName();
            $this->assertEquals("Footlocker", $result);
        }

        function test_delete()
        {
            //Arrange
            $name = "Nike";
            $id = null;
            $new_store = new Store($name, $id);
            $new_store->save();

            $name2 = "Footlocker";
            $id2 = null;
            $new_store2 = new Store($name2, $id2);
            $new_store2->save();
            //Act
            $new_store->delete();
            //Assert
            $result = Store::getAll();
            $this->assertEquals([$new_store2], $result);
        }


    }

?>
