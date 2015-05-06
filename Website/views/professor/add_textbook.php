<?php
    $page = new Page("Add Textbook");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $instructor_id = $_POST["instructor_id"];
        $course_id = $_POST["course_id"];
        $book_title = $_POST["book_title"];
        $author = $_POST["author"]; 
        $edition = $_POST["edition"];
        $isbn = $_POST["isbn"]; 
        $publisher = $_POST["publisher"];

        $DB->execute(
            "INSERT INTO Textbook ( instructor_id, course_id, book_title, author, edition, isbn, publisher) VALUES(
            '".$instructor_id."',
            '".$course_id."',
            '".$book_title."',
            '".$author."',
            '".$edition."',
            '".$isbn."',
            '".$publisher."'
            )"
        );


        $page->addQuery("message", "Textbook has been added.");
        $page->redirect();

    } else { //No Post, display page.
        $page = new Page("Add a Textbook");
        $page->showHeader();

        $ins = buildArrays($DB->execute("SELECT instructor_id, name FROM Instructors")->fetchAll(), "instructor_id", "name");
        $course = buildArrays($DB->execute("SELECT id, description FROM Courses")->fetchAll(), "id", "description");

        echo newForm(
            "add_textbook",
            $page->getPage(),
            "Add a Textbook",
            array(
                optionItem(1, "Instructor", "instructor_id", $ins[0], $ins[1]),
                optionItem(2, "Course", "course_id", $course[0], $course[1]),
                formItem(3, "Book Title", "book_title"),
                formItem(4, "Author", "author"),
                formItem(5, "Edition", "edition"),
                formItem(6, "ISBN Number", "isbn"),
                formItem(7, "Publisher", "publisher")
            )
        );


        $headerValues = array("Instructor", "Course", "Title", "Author", "Ed.", "ISBN", "Publisher");

        $rowValues = $DB->execute("SELECT instructor_id, course_id, book_title, author, edition, isbn, publisher FROM Textbook")->fetchAll();



        echo '<div id="form_container"><p style="margin-left:2px; font-weight: bold;">Textbooks</p>'
            . newTable($headerValues, $rowValues)
            . '</div>';

        $page->showFooter();
    }

?>



















