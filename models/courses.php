<?php
    function get_courses(){
        global $database;
        $query = 'SELECT * FROM courses ORDER BY course-id';
        $statement = $database->prepare($query);
        $statement->execute();
        $courses = $statement->fetchAll();
        $statement->closeCursor();
        return $courses;
    }
    
    function get_course_name($course_id){
        if(!$course_id){ return 'All courses';}
        global $database;
        $query = 'SELECT * FROM courses WHERE course-id = :course_id';
        $statement = $database->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->execute();
        $course = $statement->fetch();
        $statement->closeCursor();
        $course_name = course['course-name'];
        return $course_name;
    }
    
    function delete_course($course_id){
        global $database;
        $query = 'DELETE FROM courses WHERE course-id = :course_id';
        $statement = $database->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->execute();
        $statement->closeCursor();
    }
    
    function add_course($course_name){
        global $database;
        $query = 'INSERT INTO courses (course-name) VALUE (:course_name)';
        $statement = $database->prepare($query);
        $statement->bindValue(':course_name', $course_name);
        $statement->execute();
        $statement->closeCursor();
    }