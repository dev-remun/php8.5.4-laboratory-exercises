<?php

    require_once 'Auth.php';
    require_once 'Book.php';
    require_once 'User.php';
    require_once 'Student.php';
    require_once 'Librarian.php';

    echo "\n\nX University Library System ====================================\n\n";
    echo "[ L ] Login (Already have an account.)\n";
    echo "[ R ] Register (Don't have an account?)\n\n";

    $student_one = new Student("student1@gmail.com", "password", 1, "BS Computer Science - 4B");
    $student_two = new Student("student2@gmail.com", "password", 2, "BS Computer Science - 4A");

    $librarian_one = new Librarian("librarian1@gmail.com", "password", "College of Science", 1);
    $librarian_two = new Librarian("librarian2@gmail.com", "password", "College of Nursing", 2);

    $students = [];
    $librarians = [];

    $students[] = $student_one;
    $students[] = $student_two;
    $librarians[] = $librarian_one;
    $librarians[] = $librarian_two;

    $user = null;

    do {

        $action = readline("Action: ");

        if($action == "L" or $action == "l") {
            $user = login($students, $librarians);
            $username = $user->getUsername();
            $type = gettype($user);
            echo "$type";
            break;
        }

        else if($action == "R" or $action == "r") {
            $user = registration($students, $librarians);
            $username = $user->getUsername();
            
            if($user instanceof Student) {
                echo "Student";
                $id = $user->getStudentID();

                echo "$id";
            }

            else {
                echo "Librarian";
                $id = $user->getEmployeeID();

                echo "$id";
            }

            break;
        }

        else {
            echo("\nInvalid action. Try again.\n");
        }

    } while(true);

?>