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

        public function setCourseName($course_name) : void {
            $this->course_name = $course_name;
        }

        public function setCourseUnit($course_unit) : void {
            $this->course_unit = $course_unit;
        }
        
        public function setCourseGrade($course_grade) : void {
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

    /**
     * GWA Calculator
     */
    echo("Welcome to GWA calculator ====================\n");
    $num_of_subject = readline('Number of subject: ');
    
    $courses = new SplFixedArray($num_of_subject);

    for($i = 0; $i < $num_of_subject; $i++) {
        $course_name = readline('Course Name: ');
        $course_unit = readline('Course Unit: ');
        $course_grade = readline('Course Grade: ');
        echo("\n======\n\n");

        $course = new Course($course_name, $course_unit, $course_grade);
        $courses[$i] = $course;
    }

    # Calculate GWA using the formula
    # GWA = summation(grade x unit) / summation(total units)

    $weighted_grades = 0;
    $total_units = 0;
    
    foreach($courses as $course) {
        $total_units += $course->getCourseUnit();
        $weighted_grade = $course->getCourseGrade() * $course->getCourseUnit();
        $weighted_grades += $weighted_grade;
    }

    $gwa = $weighted_grades / $total_units;

    $latin_honor = match(true) {
        $gwa >= CUMLAUDE_MAX && $gwa <= CUMLAUDE_MIN => "Cum Laude", # 1.46, 1.75
        $gwa >= MAGNA_CUMLAUDE_MAX && $gwa <= MAGNA_CUMLAUDE_MIN => "Magna Cum Laude", # 1.21, 1.45
        $gwa >= SUMMA_CUMLAUDE_MAX && $gwa <= SUMMA_CUMLAUDE_MIN => "Summa Cum Laude", # 1.00, 1.20
        default => "No Latin Honor",
    };

    echo("$gwa - $latin_honor\n");

?>