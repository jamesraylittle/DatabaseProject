<?php
    $page = new Page("Course Catalog");
    $page->showHeader();

    echo newForm(
        "course", //Form Id
        $page->getPage(), //Form Action
        "Course Catalog Year", //Title
        array(
            formItem(1, "Course", "course"), //form input field
            formItem(2, "Catalog Year", "catalog_year") //Form input field
        )
    );

    $page->showFooter();
?>