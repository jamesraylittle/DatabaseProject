<?php
    $page = new Page("Assign Professor to a Section");


    if(isset($_POST['submit'])) {

        $semester_id = $_POST["semester_id"];
        $course_id = $_POST["course_id"];
        $section_number = $_POST['section_number'];
        $instructor_id = $_POST["instructor_id"]; 
        $time = $_POST["time"];
        $max_enrolled = $_POST["max_enrolled"]; 
        $enrolled = $_POST["enrolled"];
        $room_no = $_POST["room_no"];


        $section_id = $DB->execute("INSERT INTO Sections (semester_id, number, time, enrolled, max_enrolled, room_no) VALUES ('".$semester_id."', '".$section_number."', '".$time."', '".$enrolled."', '".$max_enrolled."', '".$room_no."')")->lastId();

        $course_section_id = $DB->execute(
            "INSERT INTO Course_Sections (course_id, section_id) VALUES (
            '".$course_id."',
            '".$section_id."'
            )"
        )->lastId();

        $DB->execute(
            "INSERT INTO Assigned_to (instructor_id, course_section_id) VALUES (
            '".$instructor_id."',
            '".$course_section_id."'
            )"
        );

        $page->addQuery("message", "Instructor has been assigned.");
        $page->redirectToMenu();

    } else { //No Post, display page.
        $page->showHeader();

        $inst_array = buildArrays($DB->execute("SELECT instructor_id, name FROM Instructors")->fetchAll(), "instructor_id", "name");
        $course_array = buildArrays($DB->execute("SELECT id, description FROM Courses")->fetchAll(), "id", "description");

        echo newForm(
            "course", //Form Id
            $page->getPage(), //Form Action
            "Assign instructor for a section", //Title
            array(
                semesterOption(1, $DB),
                optionItem(2, "Course", "course_id", $course_array[0], $course_array[1]),
                formItem(3, "Section number", "section_number"),
                optionItem(4, "Instructor", "instructor_id", $inst_array[0], $inst_array[1]),
                formItem(5, "Course Time (Ex: 9:00 AM)", "time"),
                formItem(6, "Section's Capacity", "max_enrolled"),
                formItem(7, "Total Enrolled", "enrolled"),
                formItem(8, "Section's Room Number", "room_no")
            )
        );
        $page->showFooter();
    }

?>















