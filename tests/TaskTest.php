<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Task.php";
    require_once "src/Category.php";

    $server = 'mysql:host=localhost;dbname=to_do_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class TaskTest extends PHPUnit_Framework_TestCase
    {
        //default delete function
        protected function tearDown()
        {
            Task::deleteAll();
            Category::deleteAll();
        }

        function testGetDescription()
        {
          //Arrange
          $description ="Do Dishes.";
          $test_task = new Task ($description);
          //Act
          $result = $test_task->getDescription();
          //Assert
          $this->assertEquals($description, $result);
        }

        function testSetDescription()
        {
          //Arrange
          $description = "Do dishes.";
          $test_task = new Task ($description);

          //Act
          $test_test->setDescription("Drink coffee.");
          $result = $test_test->getDescription();

          //Assert
          $this->assertEquals("Drink coffee.", $result);
        }

        function test_getId()
        {
            //Arrange
            $id = 1;
            $description = "Wash the dog";
            $test_task = new Task($description, $id);

            //Act
            $result = $test_task->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_getCategoryId()
        {
          //Arrange
          $name = "Home stuff";
          $id = null;
          $test_category = new Category($name, $id);
          $test_category->save();

          $description = "Wash the dog";
          $test_task = new Task($description, $id);
          $test_task->save();

          //Act
          $result = $test_task->getCategoryId();

          //Assert
          $this->assertEquals(true, is_numeric($result));
        }

        //test Task save function
        function test_save()
        {
            //Arrange
            $id = 1;
            $description = "Wash the dog";
            $test_task = new Task($description, $id);

            //Act
            $test_task->save();

            //Assert
            $result = Task::getAll();
            $this->assertEquals($test_task, $result[0]);
        }

        function testSaveSetsId()
        {
          //Arrange
          $description = "Wash the dog";
          $id = 1;
          $test_task = new Task($description, $id);

          //Act
          $test_task->save();

          //Assert
          $result = Task::getAll();
          $this->assertEquals(true, is_numeric($test_task->getId()));
        }

        //test Task getAll function
        function test_getAll()
        {
            //Arrange
            $description = "Wash the dog";
            $id = 1;
            $test_task = new Task($description, $id);
            $test_task->save();

            $description2 = "Water the lawn";
            $id2 = 2;
            $test_task2 = new Task($description2, $id2);
            $test_task2->save();

            //Act
            $result = Task::getAll();

            //Assert
            $this->assertEquals([$test_task, $test_task2], $result);
        }

        //test Task deleteAll function
        function test_deleteAll()
        {
            //Arrange
            $description = "Wash the dog";
            $id = 1;
            $test_task = new Task($description, $id);
            $test_task->save();

            $description2 = "Water the lawn";
            $id2 = 2;
            $test_task2 = new Task($description2, $id);
            $test_task2->save();

            //Act
            Task::deleteAll();

            //Assert
            $result = Task::getAll();
            $this->assertEquals([], $result);
        }


        function testDeleteTask()
        {
          //Arrange
          $description = "Wash the dog";
          $id = 1;
          $test_task = new Task($description, $id);
          $test_task->save();

          $description2 = "Water the lawn";
          $id2 = 2;
          $test_task2 = new Task($description2, $id2);
          $test_task2->save();

          //Act
          $test_task->delete();

          //Assert
          $this->assertEquals([$test_task2], Task::getAll());
        }

        function test_find()
        {
            //Arrange
            $description = "Wash the dog";
            $id = 1;
            $test_task = new Task($description, $id);
            $test_task->save();

            $description2 = "Water the lawn";
            $id2 = 2;
            $test_task2 = new Task($description2, $id2);
            $test_task2->save();

            //Act
            $result = Task::find($test_task->getId());

            //Assert
            $this->assertEquals($test_task, $result);
        }

        function testUpdate()
        {
          $description = "Wash the dog";
          $id = 1;
          $test_task = new Task($description, $id);
          $test_task->save();

          $new_description = "Clean the dog";

          //Act
          $test_task->update($new_description);

          //Assert
          $this->assertEquals("Clean the dog", $test_task->getDescription());
        }
    }

?>
