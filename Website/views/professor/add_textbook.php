<?php
    $page = new Page("Add a Textbook");
    $page->showHeader();

    echo newForm(
        "add_textbook",
        $page->getCurrentPage(),
        "Add Textbook",
        array(
            formItem(1, "Instructor's ID", "instructor_id"),
            formItem(2, "Section ID", "section_id"),
            formItem(3, "Book Title", "title"),
            formItem(4, "Author", "author"),
            formItem(5, "Edition", "edition"),
            formItem(6, "ISBN Number", "isbn"),
            formItem(7, "Publisher", "publisher")
        )
    );

        $page->showFooter();
?>