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
                Category::deleteAll();

          }

          function test_save()
        {
            //Arrange
            $name = "Home stuff";
            $id = null;

            $test_category = new Category($name, $id);
            $test_category->save();


            $due_date = "2012-12-12";
            $description = "Wash the dog";
            $category_id = $test_category->getId();
            $test_task = new Task($description, $id, $category_id, $due_date);

            //Act
            $test_task->save();

            //Assert
            $result = Task::getAll();
            //var_dump($result);
            $this->assertEquals($test_task, $result[0]);
        }




          function test_getAll()
          {
              //Arrange
              $name = "Home stuff";
              $id = null;
              $test_category = new Category($name, $id);
              $test_category->save();

              $description = "Wash the dog";
              $category_id = $test_category->getId();
              $due_date = '1212-12-12';
              $test_Task = new Task($description, $id, $category_id, $due_date);
              $test_Task->save();


              $description2 = "Water the lawn";
              $test_Task2 = new Task($description2, $id, $category_id, $due_date);
              $test_Task2->save();


              //Act
              $result = Task::getAll();

              //Assert
              $this->assertEquals([$test_Task,$test_Task2], $result);
          }//end function

          function test_deleteAll()
          {
              //Arrange
              $name = "Home stuff";
              $id = null;
              $test_category = new Category($name, $id);
              $test_category->save();

              $description = "Wash the dog";
              $category_id = $test_category->getId();
              $test_Task = new Task($description, $id, $category_id);
              $test_Task->save();

              $description2 = "Water the lawn";
              $test_Task2 = new Task($description2, $id, $category_id);
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
              $name = "Home stuff";
              $id = null;
              $test_category = new Category($name, $id);
              $test_category->save();

              //Arrange
              $description = "Wash the dog";
              $category_id = $test_category->getId();
              $test_Task = new Task($description, $id, $category_id);
              $test_Task->save();

              //Act
              $result = $test_Task->getId();

              //Assert
              $this->assertEquals(true, is_numeric($result));
          }

          function test_getCategoryId()
            {
                //Arrange
                $name = "Home stuff";
                $id = null;
                $test_category = new Category($name, $id);
                $test_category->save();

                $description = "Wash the dog";
                $category_id = $test_category->getId();
                $test_task = new Task($description, $id, $category_id);
                $test_task->save();

                //Act
                $result = $test_task->getCategoryId();

                //Assert
                $this->assertEquals(true, is_numeric($result));
            }

         function test_find()
            {
                //Arrange
                $name = "Home stuff";
                $id = null;
                $test_category = new Category($name, $id);
                $test_category->save();

                $description = "Wash the dog";
                $category_id = $test_category->getId();
                $due_date = "2032-12-23";
                $test_task = new Task($description, $id, $category_id,$due_date);
                $test_task->save();

                $description2 = "Water the lawn";
                $due_date = "2012-12-12";
                $test_task2 = new Task($description2, $id, $category_id,$due_date);
                $test_task2->save();

            //Act
                $result = Task::find($test_task->getId());

            //Assert
                $this->assertEquals($test_task, $result);

            }

            function test_duedate()
            {
                //arrange
                $name = "Home stuff";
                $id = null;
                $test_category = new Category($name, $id);
                $test_category->save();

                $name = "Home stuff";
                $category_id = $test_category->getId();
                $description = "Blahblah";
                $due_date = "2012-12-12";
                $test_task = new Task($description, $id, $category_id, $due_date);
                $test_task->save();

                //asssert
                $this->assertEquals("2012-12-12", $test_task->getDueDate());


            }


    }// end class
?>
