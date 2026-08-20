<?php

    require_once 'Auth.php';
    require_once 'Book.php';
    require_once 'User.php';
    require_once 'Student.php';
    require_once 'Librarian.php';
    require_once 'StudentDashboard.php';
    require_once 'LibrarianDashboard.php';

    echo "\n\nX University Library System ====================================\n\n";
    echo "[ L ] Login (Already have an account.)\n";
    echo "[ R ] Register (Don't have an account?)\n\n";

    $sample_abstract = "                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

    $student_one = new Student("std1", "pass", 1, "BS Computer Science - 4B");
    $student_two = new Student("std2", "pass", 2, "BS Computer Science - 4A");

    $librarian_one = new Librarian("lib1", "pass", "College of Science", 1);
    $librarian_two = new Librarian("lib2", "pass", "College of Science", 2);

    $book_one = new Book("Book 1", "Lorem Ipsum", $sample_abstract, "02-02-2002");
    $book_two = new Book("Book 2", "Lorem Ipsum", $sample_abstract, "02-06-2002");
    $book_three = new Book("Book 3", "Lorem Ipsum", $sample_abstract, "02-08-2002");
    $book_four = new Book("Book 4", "Lorem Ipsum", $sample_abstract, "02-20-2002");
    $book_five = new Book("Book 5", "Lorem Ipsum", $sample_abstract, "02-22-2002");
    $book_six = new Book("Book 6", "Lorem Ipsum", $sample_abstract, "02-24-2002");

    $books = [];
    $students = [];
    $librarians = [];

    $books[] = $book_one;
    $books[] = $book_two;
    $books[] = $book_three;
    $books[] = $book_four;
    $books[] = $book_five;
    $books[] = $book_six;
    $students[] = $student_one;
    $students[] = $student_two;
    $librarians[] = $librarian_one;
    $librarians[] = $librarian_two;

    $is_logged_in = false;
    $user = null;

    do {

        $action = readline("Action: ");

        if($action == "L" or $action == "l") {
            $user = login($students, $librarians);

            if($user == null) continue;

            else {
                $is_logged_in = true;
                break;
            }
        }

        else if($action == "R" or $action == "r") {
            $user = registration($students, $librarians);

            if($user == null) continue;

            else {
                $is_logged_in = true;
                break;
            }
        }

        else {
            echo("\nInvalid action. Try again.\n");
        }

    } while(true);

    if($is_logged_in && $user instanceof Student) {
        studentDashboard($user, $books);
    }

    else if($is_logged_in && $user instanceof Librarian) {
        librarianDashboard($user, $books);
    }

?>