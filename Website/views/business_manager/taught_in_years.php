<?php
    $page = new Page("Taught in Years");
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
