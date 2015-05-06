<?php

$page = new Page("Add Course");


if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
    //Making assumptions about if the values are set and are "valid".


    $subject = strtoupper($_POST['subject']);
    $level = $_POST['level'];
    $description = $_POST['description'];

    $crn = $_POST['crn'];
    $req = isset($_POST['required']);
    $special = isset($_POST['special']);

    $DB->execute("INSERT INTO Courses (subject, level, description, crn, required, special) VALUES ('".$subject."', '".$level."', '".$description."', '".$crn."', '".$req."', '".$special."')");

    $page->addQuery("message", "Added Course");

    $page->redirect();

} else { //No Post, display page.
    $page->showHeader();

    $levels = array(1000, 2000, 3000, 4000, 5000);

    echo  newForm(
        "add_course",
        $page->getPage(),
        "Add a Course",
        array(
            formItem(1, "Course Subject (i.e. CS, ECE, MATH)", "subject"),
            formItem(2, "Course Level (i.e 2301, 4532", "level"),
            formItem(3, "Description", "description"),
            formItem(4, "CRN", "crn"),
            formCheckBox(5, "Required?", "required", true),
            formCheckBox(6, "Special?", "special", true)
        )
    );

    $headerValues = array("Subject", "Level", "Description", "CRN", "Required?", "Special?");

    $rowValues = $DB->execute("SELECT subject, level, description, crn, required, special FROM Courses")->fetchAll();

    echo '<div id="form_container"><p style="margin-left:2px; font-weight: bold;">Courses</p>'
        . newTable($headerValues, $rowValues)
        . '</div>';




    $page->showFooter();
}

?>


