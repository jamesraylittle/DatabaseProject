<?php
    $page = new Page("Update Preferences");


    if(isset($_POST['submit'])) {
        $instructor_id = $_POST["instructor_id"];
        $course_id = $_POST["course_id"];
        $year = $_POST["year"];
        $loads= $_POST["loads"];

        $DB->execute(
            "INSERT INTO Instructor_preference ( instructor_id, course_id, year, loads) VALUES(
            '".$instructor_id."',
            '".$course_id."',
            '".$year."',
            '".$loads."'
            )"
        );

        $page->addQuery("message", "Preference has been updated.");
        $page->redirectToMenu();

    } else { //No Post, display page.
        $page->showHeader();

        $ins = buildArrays($DB->execute("SELECT instructor_id, name FROM Instructors")->fetchAll(), "instructor_id", "name");
        $course = buildArrays($DB->execute("SELECT id, description FROM Courses")->fetchAll(), "id", "description");

        $loads = array("Fall", "Spring", "Summer I", "Summer II", "Winter", "Equal");

        echo newForm(
           "update_pref",
            $page->getPage(),
            "Update Preferences",
            array(
                optionItem(1, "Instructor", "instructor_id", $ins[0], $ins[1]),
                optionItem(2, "Course Preference to Teach", "course_id", $course[0], $course[1]),
                formItem(3, "Course Year to Teach", "year"),
                optionItem(4, "Enter Load Distribution", "loads", $loads, $loads)
            )
        );

        $page->showFooter();
    }

?>