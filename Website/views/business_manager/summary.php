<?php
    $page = new Page("Textbook Information");
    $page->showHeader();

    echo newForm(
        "book_info",
        $page->getPage(),
        "Textbook Information",
        array(
            formItem(1, "Instructor's ID", "instructors_id"),
        )
    );


    $page->showFooter();
?>
