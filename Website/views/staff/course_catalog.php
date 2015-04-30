<?php
    $page = new Page("Select Position");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $year = $_POST["catalog_year"];

        $page->addQuery("year", $year);
        $page->redirect();
    } else if(isset($_GET["year"])) {
        $year = $_GET['year'];
        $page->showHeader();

        $result = $DB->execute("SELECT * FROM courses WHERE catalog_year = '".$year."'")->fetchAll();

        foreach($result as $row) {
            echo($row["required"]);
        }

        $page->showFooter();
    } else { //No Post, display page.
    $page = new Page("Course Catalog");
    $page->showHeader();

    echo newForm(
        "course", //Form Id
        $page->getPage(), //Form Action
        "Course Catalog Year", //Title
        array(
            formItem(1, "Catalog Year", "catalog_year") //Form input field
        )
    );

    $page->showFooter();
    }

?>


