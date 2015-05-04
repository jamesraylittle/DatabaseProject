<?php
    $page = new Page("Assign a TA");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $course_id = $_POST["course_id"];
        $section_id = $_POST["section_id"];
        $name = $_POST["name"]; 
        $hours = $_POST["hours"];
        $ta_id = $_POST["ta_id"];

        $DB->execute(
            "INSERT INTO TAs (name, hours) VALUES(
            '".$name."',
            '".$hours."'
            )"
  );

$DB->execute(
            "INSERT INTO TA_Assigned_to (section_id, ta_id) VALUES(
            '".$section_id."',
            '".$ta_id."'
            )"
        );


        $page->addQuery("message", "TA has been assigned.");
        $page->redirectToMenu();
}
    else { //No Post, display page.
    $page = new Page("Assign a TA");
    $page->showHeader();

    echo newForm(
        "assignTA",
        $page->getPage(),
        "Assign a TA / Grader.",
        array(
            formItem(1, "Course ID", "course_id"),
            formItem(2, "Section ID", "section_id"),
            formItem(3, "TA \\ Grader", "name"),
            formItem(3, "TA \\ Grader ID", "ta_id"),
            formItem(4, "Hours Assigned to TA \\ Grader", "hours")
        )
    );

    $page->showFooter();
}
?>
