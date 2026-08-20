<?php

    function librarianDashboard(User $user, array $books) {
        
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
?>