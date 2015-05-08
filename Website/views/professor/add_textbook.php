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
        $page->redirectToMenu();
}
    else { //No Post, display page.
    $page = new Page("Add a Textbook");
    $page->showHeader();

    echo newForm(
        "add_textbook",
        $page->getPage(),
        "Add a Textbook",
        array(
            formItem(1, "Instructor's ID", "instructor_id"),
            formItem(2, "Course ID", "course_id"),
            formItem(3, "Book Title", "book_title"),
            formItem(4, "Author", "author"),
            formItem(5, "Edition", "edition"),
            formItem(6, "ISBN Number", "isbn"),
            formItem(7, "Publisher", "publisher")
        )
    );

        $page->showFooter();
    }

?>



















