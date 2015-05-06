<?php
    $page = new Page("Professor Preferences");
    $page->showHeader();


    if(isset($_POST['submit'])) {
        $year = $_POST["year"];
        $headerValues = array("Instructor Name", "Course", "Year", "Loads");
        $rowValues = array();
        $title = "Professor Preferences for Year " . $year;


        $values = $DB->execute("SELECT instructor_id, course_id, year, loads FROM instructor_preference WHERE year = '".$year."'")->fetchAll();

        for($i = 0; $i<sizeof($values); $i++) {
            $tmp = array($i =>
                array(
                    $DB->execute("SELECT name FROM Instructors WHERE instructor_id = '".$values[$i]['instructor_id']."'")->fetchRow()['name'],
                    $DB->execute("SELECT description FROM Courses WHERE id = '".$values[$i]['course_id']."'")->fetchRow()['description'],
                    $values[$i]["year"],
                    $values[$i]["loads"]
                )
            );
            $rowValues = array_merge($rowValues, $tmp);
        }


        results($title, $headerValues, $rowValues);



        




    } else { //No Post, display page.

        echo newForm(
            "Preferences",
            $page->getPage(),
            "Preferences",
            array(
                formItem(1, "Enter year", "year")
            )
        );

    }
    $page->showFooter();

?>








