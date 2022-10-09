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
        case "list_courses":
            $courses = get_courses();
            include('views/courses.php');
            break;
        case "add_course":
            add_course($course_name);
            header('Location: .?action=list_courses');
            break;
        case "add_assignment":
            if($course_id && $assignment_description){
                add_assignment($course_id, $assignment_description);
                header('Location: .?course_id=$course_id');
            } else {
                $error = "Invalid assignment data. Check all fields and try again.";
                include('views/error.php');
                exit();
            }
            break;
        case "delete_course":
            if($course_id){
                try {
                    delete_course($course_id);
                } catch (PDOException $ex){
                    $error = "You cannot delete a course if assignments exist for it.";
                    include('views/error.php');
                    exit();
                }
                header('Location: .?action=list_courses');
            }
            break;
        case "delete_assignment":
            if($assignment_id){
                delete_assignment($assignment_id);
                header('Location: .?course_id=$course_id');
            } else {
                console.log('Hey');
                $error = "Missing or incorrect assignment id.";
                include('views/error.php');
            }
            break;
        default:
            $course_name = get_course_name($course_id);
            $courses = get_courses();
            $assignments = get_assignments_by_course($course_id);
            include('views/assignments.php');
    }