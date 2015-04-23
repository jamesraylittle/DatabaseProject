<?php
    $page = new Page("Assigned Courses");
    $page->showHeader();

    echo newForm(
        "assigned_courses",
        $page->getPage(),
        "Assigned Courses",
        array(
         formItem(1, "Instructor's ID", "instructor_id")
        )
    );

    $page->showFooter();
?>
