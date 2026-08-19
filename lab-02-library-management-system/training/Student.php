<?php

    require_once 'User.php';

    class Student extends User {
        protected $student_id;
        protected $course_and_year_bloc;

        public function __construct($username, $password, $student_id, $course_and_year_bloc) {

            parent::__construct($username, $password);

            $this->student_id = $student_id;
            $this->course_and_year_block = $course_and_year_bloc;
        }

        public function getStudentID() {
            return $this->student_id;
        }

        public function getCourse() {
            return $this->course_and_year_bloc;
        }

    }

?>