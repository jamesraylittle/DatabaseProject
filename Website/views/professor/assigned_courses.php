<?php
    $page = new Page("Course Assigned");

    $page->showHeader();


    if(isset($_POST['submit'])) {
        $id = $_POST["instructor_id"];

        $title = "Courses for Instructor";
        $headerValues = array("Subject", "Level", "Description", "CRN", "Required?", "Special?");
        $rowValues = array();

        foreach($DB->execute("SELECT * FROM Assigned_to WHERE instructor_id = '".$id."'")->fetchAll() as $row) {
            $course_id = $DB->execute("SELECT course_id FROM Course_sections WHERE id = '".$row['course_section_id']."'")->fetchRow()['course_id'];

            $rowValues = array_merge($rowValues, $DB->execute("SELECT subject, level, description, crn, required, special FROM courses WHERE id = '".$course_id."'")->fetchAll());
        }

        results($title, $headerValues, $rowValues);

    } else { //No Post, display page.

        $ins = buildArrays($DB->execute("SELECT instructor_id, name FROM Instructors")->fetchAll(), "instructor_id", "name");

        echo newForm(
            "Courses Assigned", //Form Id
            $page->getPage(), //Form Action
            "Course assigned", //Title
            array(
                optionItem(1, "Instructor", "instructor_id", $ins[0], $ins[1])//Form input field
            )
        );

    }

    $page->showFooter();

?>


