<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Task.php";

    $server = 'mysql:host=localhost;dbname=to_do_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class TaskTest extends PHPUnit_Framework_TestCase
    {

          protected function tearDown()
          {
                Task::deleteAll();

          }

          function test_save()
          {
              //Arrange
              $description = "Wash the dog";
              $test_Task = new Task($description);

              //Act
              $test_Task->save();

              //Assert
              $result = Task::getALL();
              $this->assertEquals($test_Task, $result[0]);
          }//end function


          function test_getAll()
          {
              //Arrange
              $description = "Wash the dog";
              $description2 = "Water the lawn";
              $test_Task = new Task($description);
              $test_Task->save();
              $test_Task2 = new Task($description2);
              $test_Task2->save();


              //Act
              $result = Task::getALL();

              //Assert
              $this->assertEquals([$test_Task,$test_Task2], $result);
          }//end function

          function test_deleteAll()
          {
              //Arrange
              $description = "Wash the dog";
              $description2 = "Water the lawn";
              $test_Task = new Task($description);
              $test_Task->save();
              $test_Task2 = new Task($description2);
              $test_Task2->save();


              //Act
              Task::deleteAll();

              //Assert
              $result = Task::getAll();
              $this->assertEquals([], $result);
          }//end function

          function test_getId()
          {
              //Arrange
              $description = "Wash the dog";
              $id = 1;
              $test_Task = new Task($description, $id);

              //Act
              $result = $test_Task->getId();

              //Assert
              $this->assertEquals(1, $result);
          }


    }// end class
?>
