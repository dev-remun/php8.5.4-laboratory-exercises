<?php

    require_once 'User.php';

    class Librarian extends User {

        protected $department;
        protected $employee_id;

        public function __construct($username, $password, $department, $employee_id) {

            parent::__construct($username, $password);

            $this->department = $department;
            $this->employee_id = $employee_id;
        }

        public function getDepartment() {
            return $this->department;
        }

        public function getEmployeeID() {
            return $this->employee_id;
        }

    }

?>