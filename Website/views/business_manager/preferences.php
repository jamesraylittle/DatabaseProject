<?php
    $page = new Page("Professors Preferences");
    $page->showHeader();

    echo newForm(
        "prof_pref",
        $page->getPage(),
        "See Preferences of all Professors.",
        array(
            formItem(1, "Year to explore (Eg. 2015)", "year")
        )
    );


    $page->showFooter();
?>
