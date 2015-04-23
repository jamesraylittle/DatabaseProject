<?php
    $page = new Page("Section Information");
    $page->showHeader();

    echo newForm(
        "section_info",
        $page->getPage(),
        "Enter Section Information",
        array(
            formItem(1, "Section ID", "section_id"),
        )
    );

    $page->showFooter();
?>