<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Task.php";

    session_start();

    if (empty($_SESSION['list_of_tasks'])) {
        $_SESSION['list_of_tasks'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {

    return $app['twig']->render('tasks.html.twig', array('tasks' => Task::getAll()));

    });


    $app->post("/tasks", function() {
          $task = new Task($_POST['description']);
          $task->save();
          return "
              <h1>You created a task!</h1>
              <p>" . $task->getDescription() . "</p>
              <p><a href='/'>View your list of things to do.</a></p>
              ";
    });

    $app->post("/delete_tasks", function() {

          Task::deleteAll();

          return "
              <h1>List Cleared!</h1>
              <p><a href='/'>Home</a></p>
              ";
    });

    return $app;

?>
