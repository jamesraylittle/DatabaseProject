<?php
    $page = new Page("List Textbooks");
    $page->showHeader();

    echo newForm(
        "list_textbooks",
        $page->getPage(),
        "See Textbooks",
        array(
            formItem(1, "Instructor's ID", "instructors_id"),
        )
    );

    $page->showFooter();
?>
