<?php
    $page = new Page("Add Special Request");
    $page->showHeader();

    echo newForm(
        "special_request",
        $page->getCurrentPage(),
        "Input Special Request",
        array(
            formItem(1, "Instructor's ID", "instructor_id"),
            formItem(2, "Course Code", "course_code"),
            formItem(3, "Title", "title"),
            formItem(4, "Arguments", "arguments")
        )
    );

    $page->showFooter();
?>

