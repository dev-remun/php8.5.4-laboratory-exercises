<?php

    define('CUMLAUDE_MIN', 1.75);
    define('CUMLAUDE_MAX', 1.46);

    define('MAGNA_CUMLAUDE_MIN', 1.45);
    define('MAGNA_CUMLAUDE_MAX', 1.21);

    define('SUMMA_CUMLAUDE_MIN', 1.20);
    define('SUMMA_CUMLAUDE_MAX', 1.00);

    class Course {
        private $course_name;
        private $course_unit;
        private $course_grade;

        public function __construct($course_name, $course_unit, $course_grade) {
            $this->course_name = $course_name;
            $this->course_unit = $course_unit;
            $this->course_grade = $course_grade;
        }

        public function getCourseName() {
            return $this->course_name;
        }

        public function getCourseUnit() {
            return $this->course_unit;
        }

        public function getCourseGrade() {
            return $this->course_grade;
        }
    }

    echo "Welcome to GWA Calculator by dev-remun ====================================\n";

    $number_of_subject = readline("Number of Subject: ");
    
    $courses = new SplFixedArray($number_of_subject);

    for($i = 0; $i < $number_of_subject; $i++) {
        $input_course_name = readline("Course Name: ");
        $input_course_unit = readline("Course Unit: ");
        $input_course_grade = readline("Course Grade: ");
        echo("\n====================================\n\n");

        $courses[$i] = new Course($input_course_name, $input_course_unit, $input_course_grade);
    }

    $total_units = 0;
    $weighted_grades = 0;

    # GWA = summation(grade x unit) / summation(total units)
    foreach($courses as $course) {
        $total_units += $course->getCourseUnit();
        $weighted_grades += $course->getCourseGrade() * $course->getCourseUnit();
    }

    $gwa = $weighted_grades / $total_units;

    $latin_honor = match(true) {
        $gwa >= CUMLAUDE_MAX && $gwa <= CUMLAUDE_MIN => "Cum Laude",
        $gwa >= MAGNA_CUMLAUDE_MAX && $gwa <= MAGNA_CUMLAUDE_MIN => "Magna Cum Laude",
        $gwa >= SUMMA_CUMLAUDE_MAX && $gwa <= SUMMA_CUMLAUDE_MIN => "Summa Cum Laude",
        default => "No Latin Honor",
    };

    echo("$gwa - $latin_honor\n");

?>