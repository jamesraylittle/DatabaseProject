<?php
    $page = new Page("Statistics");
    $page->showHeader();

    echo newForm(
        "stats",
        $page->getPage(),
        "Statistics",
        array(
            formItem(1, "How many years to collect statistics?", "years")
        )
    );

    $page->showFooter();
?>
