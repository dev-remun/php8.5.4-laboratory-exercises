<?php

    require_once 'User.php';
    require_once 'Librarian.php';
    require_once 'Student.php';

    function clearTerminal() {
        echo "\033[2J\033[H";
    }

    function login($students, $librarians) {
        clearTerminal();

        echo "\nX University Library System (LOGIN) ====================================\n\n";
        
        do {
            $username = readline("Username [X]: ");
            
            if($username == "X" or $username == "x") {
                return null;
            }

            $password = readline("Password [X]: ");

            if($password == "X" or $password == "x") {
                return null;
            }

            foreach($students as $student) {
                if($username == $student->getUsername() && $password == $student->getPassword()) {
                    return $student;
                }
            }

            foreach($librarians as $librarian) {
                if($username == $librarian->getUsername() && $password == $librarian->getPassword()) {
                    return $librarian;
                }
            }

            echo "Your account does not exist. Please register first or review your credentials.\n\n";

        } while(true);
    }

    function registration($students, $librarians) {
        clearTerminal();

        echo "\nX University Library System (REGISTRATION) ====================================\n\n";

        $is_email_already_exist = false;
        
        do {
        
            $username = readline("Username [X]: ");
            
            if($username == "X" or $username == "x") {
                return null;
            }

            $password = readline("Password [X]: ");

            if($password == "X" or $password == "x") {
                return null;
            }

            foreach($students as $student) {
                if($username == $student->getUsername()) {
                    $is_email_already_exist = true;
                }
            }

            if($is_email_already_exist == true) {
                echo "Email already exist. Please review your credentials.";
                continue;
            }

            else {

                if(str_starts_with($username, "std")) {
                    $new_student = new Student($username, $password, count($students) + 1, "BS in Computer Science");
                    $students[] = $new_student;
                    return $new_student;
                }

                else if(str_starts_with($username, "lib")) {
                    $new_librarian = new Librarian($username, $password, "College of Science", count($librarians) + 1);
                    $librarians[] = $new_librarian;
                    return $new_librarian;
                }

                else {
                    echo "\nInvalid email format. Use (std) if student, and (lib) if librarian. Please review your credentials.\n\n";
                    continue;
                }

            }

        } while(true);
    }

?>