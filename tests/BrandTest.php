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

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }

        function test_save_and_getAll()
        {
            //Arrange
            $name = "Y3";
            $id = null;
            $new_brand = new Brand($name, $id);

            //Act
            $new_brand->save();
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([$new_brand], $result);
        }

        function test_find()
        {
            //Arrange
            $name = "Y3";
            $id = null;
            $new_brand = new Brand($name, $id);
            $new_brand->save();

            //Act
            $result = Brand::find($new_brand->getId());

            //Assert
            $this->assertEquals($new_brand, $result);
        }

        function test_update()
        {
            //Arrange
            $name = "Y3";
            $id = null;
            $new_brand = new Brand($name, $id);
            $new_brand->save();

            //Act
            $new_name = "Snakey Sneaks";
            $new_brand->update($new_name);
            //Assert
            $result = Brand::find($new_brand->getId())->getName();
            $this->assertEquals("Snakey Sneaks", $result);
        }

        function test_delete()
        {
            //Arrange
            $name = "Y3";
            $id = null;
            $new_brand = new Brand($name, $id);
            $new_brand->save();

            $name2 = "Snakey Sneaks";
            $id2 = null;
            $new_brand2 = new Brand($name2, $id2);
            $new_brand2->save();
            //Act
            $new_brand->delete();
            //Assert
            $result = Brand::getAll();
            $this->assertEquals([$new_brand2], $result);
        }

        function test_getBrands()
        {
            //Arrange
            $name2 = "Snakey Sneaks";
            $id2 = null;
            $new_brand = new Brand($name2, $id2);
            $new_brand->save();

            $name = "Nike";
            $id = null;
            $new_store = new Store($name, $id);
            $new_store->save();


            //Act
            $new_brand->addStore($new_store->getId());
            $result = $new_brand->getStores();

            //Assert
            $this->assertEquals([$new_store], $result);
        }
    }

?>
