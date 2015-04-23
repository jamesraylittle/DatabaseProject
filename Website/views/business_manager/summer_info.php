<?php
    $page = new Page("Summer Course Information");
    $page->showHeader();

    echo newForm(
        "summer_info",
        $page->getPage(),
        "Summer Course Information",
        array(
            formItem(1, "Number of years to explore", "years")
        )
    );

    $page->showFooter();
?>
