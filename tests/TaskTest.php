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
          function test_save()
          {
              //Arrange
              $description = "Wash the dog";
              $test_task = new Task($description);

              //Act
              $test_task->save();

              //Assert
              $result = Task::getALL();
              $this->assertEquals($test_task, $result[0]);
          }
    }
?>
