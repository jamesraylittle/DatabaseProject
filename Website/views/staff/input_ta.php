<?php
    $page = new Page("Assign a TA");
    $page->showHeader();

    echo newForm(
        "assignTA",
        $page->getPage(),
        "Assign a TA / Grader.",
        array(
            formItem(1, "Course", "course"),
            formItem(2, "Section", "section"),
            formItem(3, "TA \\ Grader", "ta_grader"),
            formItem(4, "Hours Assigned to TA \\ Grader", "ta_hours")
        )
    );

    $page->showFooter();
?>