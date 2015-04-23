<?php
    $page = new Page("Update Preferences");
    $page->showHeader();

    echo newForm(
       "update_pref",
        $page->getCurrentPage(),
        "Update Preferences",
        array(
            formItem(1, "Instructor's ID", "instructor_id"),
            formItem(2, "Course Preferences to Teach", "course_pref"),
            formItem(3, "Course Year to Teach", "course_year")
        )
    );

    $page->showFooter();
?>


