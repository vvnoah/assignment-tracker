<?php
    // Getting data from the models
    require 'models/database.php';
    require 'models/assignments.php';
    require 'models/courses.php';
    
    $assignment_id = filter_input(INPUT_POST, 'assignment_id', FILTER_VALIDATE_INT);
    $assignment_description = filter_input(INPUT_POST, 'assignment_description', FILTER_VALIDATE_STRING);
    
    $course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);
    if(!$course_id){ filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT); } // NULL or false is allowed
    $course_name = filter_input(INPUT_POST, 'course_name', FILTER_VALIDATE_STRING);