<?php
    $page = new Page("Course Information");
    $page->showHeader();

    echo newForm(
        "course_info",
        $page->getPage(),
        "Enter Course Information",
        array(
            formItem(1, "Course ID", "course_id"),
            formItem(2, "Years to Explore", "years")
        )
    );

    $page->showFooter();
?>
