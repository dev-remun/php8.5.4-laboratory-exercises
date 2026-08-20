
<?php

    require_once 'Book.php';
    require_once 'User.php';
    require_once 'Auth.php';

    function studentDashboard(User $user, array $books) {
        
        $username = $user->getUsername();

        clearTerminal();

        echo "\nX University Library System (DASHBOARD) ====================================\n\n";
        
        echo "Welcome $username\n\n";

        echo "Available Books: \n\n";

        foreach($books as $book) {
            $book_title = $book->getBookTitle();
            $book_author = $book->getBookAuthor();

            echo "    [ $book_title ] - [ by $book_author ]\n";
        }

        $found_book = searchBook($books);

        if($found_book != null) {
            readBook($found_book);
        }

        else {
            return;
        }

    }

    function searchBook(array $books) {

        $found_book = null;

        do {

            $input_book_name = readline("\nComplete Book Title: ");

            foreach($books as $book) {
                if($book->getBookTitle() == $input_book_name) {
                    $found_book = $book;
                    return $found_book;
                }
            }

            if($found_book == null) {
                echo "$input_book_name not found. Please check your input and retry.\n";
                continue;
            }

        } while(true);

    }

    function readBook(Book $book) {
        
        clearTerminal();

        $book_title = $book->getBookTitle();
        $book_author = $book->getBookAuthor();
        $book_abstract = $book->getBookAbstract();
        $book_published_date = $book->getBookPublishedDate();

        echo "\n$book_title by $book_author (READING AREA) ====================================\n";
        echo "$book_published_date\n\n";

        echo "$book_abstract \n\n";
        echo "Thank you for reading!\n\n";

        do {

            $action = readline("Exit [X]: ");

            if($action == "X" or $action == "x") {
                break;
            }

            else {
                echo "Invalid action try again.\n\n";
            }

        } while(true);

    }

?>