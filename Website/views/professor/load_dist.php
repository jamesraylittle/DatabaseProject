<?php
    $page = new Page("Update Load Distribution");
    $page->showHeader();

    echo newForm(
        "load_dist",
        $page->getCurrentPage(),
        "Update Load Distribution",
        array(
            formItem(1, "Instructor's ID", "instructor_id"),
            optionItem(2, "Which Semester to add more load?", "semester",
                array(1, 2, 3),
                array("Equal distribution", "Spring", "Fall")
            )
        )
    );

    $page->showFooter();
?>
