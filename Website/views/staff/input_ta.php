<?php
    $page = new Page("Assign a TA");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".

        $course_section_id = $_POST['course_section_id'];

        $row = $DB->execute("SELECT * FROM Course_sections WHERE id = '".$course_section_id."'")->fetchRow();

        $course_id = $row["course_id"];
        $section_id = $row["section_id"];

        $name = $_POST["name"]; 
        $hours = $_POST["hours"];

        $ta_id = $DB->execute("INSERT INTO TAs (name, hours) VALUES('".$name."', '".$hours."')")->lastId();

        $DB->execute("INSERT INTO TA_Assigned_to (section_id, ta_id) VALUES('".$section_id."','".$ta_id."')");


        $page->addQuery("message", "TA has been assigned.");
        $page->redirectToMenu();

    } else { //No Post, display page.
        $page->showHeader();

        $course_array = buildArrays($DB->execute("SELECT id, description FROM Courses")->fetchAll(), "id", "description");



        echo newForm(
            "assignTA",
            $page->getPage(),
            "Assign a TA / Grader.",
            array(
                courseSectionOption(1, $DB),
                formItem(2, "TA \\ Grader Name", "name"),
                formItem(3, "Hours Assigned to TA \\ Grader", "hours")
            )
        );

        $page->showFooter();
    }
?>
