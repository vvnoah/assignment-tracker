<?php
    function get_assignments_by_course($course_id){
        global $database;
        if($course_id){
            $query = 'SELECT A.assignment_id, A.assignment_description, C.course_name FROM assignments A LEFT JOIN courses C ON A.course_id = C.course_id WHERE A.course_id = :course_id ORDER BY assignment_id';
        }else{
            $query = 'SELECT A.assignment_id, A.assignment_description, C.course_name FROM assignments A LEFT JOIN courses C ON A.course_id = C.course_id ORDER BY C.course_id';
        }
        $statement = $database->prepare($query);
        if($course_id){ $statement->bindValue(':course_id', $course_id); } // Insert variable into query
        $statement->execute();
        $assignments = $statement->fetchAll();
        $statement->closeCursor();
        return $assignments;
    }
    
    function delete_assignment($assignment_id){
        global $database;
        $query = 'DELETE FROM assignments WHERE assignment_id = :assignment_id';
        $statement = $database->prepare($query);
        $statement->bindValue(':assignment_id', $assignment_id);
        $statement->execute();
        $statement->closeCursor();
    }
    
    function add_assignment($course_id, $assignment_description){
        global $database;
        $query = 'INSERT INTO assignments (assignment_description, course_id) VALUES (:assignment_description, :course_id)';
        $statement = $database->prepare($query);
        $statement->bindValue(':assignment_description', $assignment_description);
        $statement->bindValue(':course_id', $course_id);
        $statement->execute();
        $statement->closeCursor();
    }