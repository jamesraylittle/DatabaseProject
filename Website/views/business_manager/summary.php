<?php
    $page = new Page("Summary Information");

    $page->showHeader();


    if(isset($_POST['submit'])) {

        $id = $_POST["instructor_id"];
        $tableRows = array();

        foreach($DB->execute("SELECT section_id FROM Assigned_to WHERE instructor_id = '".$id."'")->fetchAll() as $row) {

            foreach($DB->execute("SELECT course_id FROM Course_Sections WHERE section_id = '".$row["section_id"]."'")->fetchAll() as $row) {


                $tableRows = array_merge(
                    $tableRows,
                    $DB->execute("SELECT name FROM Courses WHERE course_id = '".$row["course_id"]."'")->fetchAll()
                );

            }

        }


        if(sizeof($tableRows) > 0) {
            dispTitle("Summary Information");
            echo newTable(array("Course Name"), $tableRows);

        } else {
            dispTitle("No Results");
            echo "No Results to display for input.";
        }

    } else { //No Post, display page.

        $array = buildArrays($DB->execute("SELECT instructor_id, name FROM Instructors")->fetchAll(), "instructor_id", "name");

        echo newForm(
            "summary_information",
            $page->getPage(),
            "Summary Information",
            array(
                optionItem(1, "Instructor", "instructor_id", $array[0], $array[1])
            )
        );

    }

    $page->showFooter();

?>







