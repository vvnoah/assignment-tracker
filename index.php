<?php
    // Getting data from the models
    require 'models/database.php';
    require 'models/assignments.php';
    require 'models/courses.php';
    
    $assignment_id = filter_input(INPUT_POST, 'assignment_id', FILTER_VALIDATE_INT);
    $assignment_description = filter_input(INPUT_POST, 'assignment_description', FILTER_SANITIZE_STRING);
    
    $course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);
    if(!$course_id){ filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT); } // NULL or false is allowed
    $course_name = filter_input(INPUT_POST, 'course_name', FILTER_SANITIZE_STRING);
    
    // Routing
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if(!$action){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if(!$action){ $action = 'list_assignments'; }
    }
    
    switch($action){
        default:
            $course_name = get_course_name($course_id);
            $courses = get_courses();
            $assignments = get_assignments_by_course($course_id);
            include('views/list-assignments.php');
    }