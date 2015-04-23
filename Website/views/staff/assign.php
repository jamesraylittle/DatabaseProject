<?php
    $page = new Page("Select Position");
    $page->showHeader();

    echo newForm(
        "course", //Form Id
        $page->getPage(), //Form Action
        "Assign instructor for a section", //Title
        array(
            formItem(1, "Semester", "semester"),
            formItem(2, "Course", "course"),
            formItem(3, "Section", "section"),
            formItem(4, "Instructor's Name", "name"),
            formItem(5, "Additional Instructor's Name (if any)", "additional_name"),
            formItem(6, "Section's Room Number", "room"),
            formTimeItem(7, "Course Time", "time"),
            formItem(8, "Section's Capacity", "capacity"),
            formItem(9, "Total Enrolled", "enrolled")
        )
    );
    $page->showFooter();
?>
