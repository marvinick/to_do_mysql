<?php
    class Task
    {
        private $description;

        function __construct($description)
        {
            $this->description = $description;
        }

        function setDescription($new_description)
        {
            $this->description = (string) $new_description;
        }

        function getDescription()
        {
            return $this->description;
        }

        function save()
        {
            array_push($SESSION['List_of_tasks'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_tasks'];
        }
    }
?>
