<?php
    $page = new Page("Select Position");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $semester = $_POST["semester"];
        $course_id = $_POST["course_id"];
        $section_id = $_POST["section_id"];
        $instructor_id = $_POST["instructor_id"]; 
        $time = $_POST["time"];
        $max_enrolled = $_POST["max_enrolled"]; 
        $enrolled = $_POST["enrolled"];
        $room_no = $_POST["room_no"];

        $DB->execute(
            "INSERT INTO Course_Sections (course_id, section_id, semester) VALUES(
            '".$course_id."',
            '".$section_id."',
            '".$semester."'
            )"

  );

        $DB->execute(
            "INSERT INTO Assigned_to (instructor_id, section_id, semester) VALUES(
            '".$instructor_id."',
            '".$section_id."',
            '".$semester."'
            )"
  );

$DB->execute(
            "INSERT INTO Sections (course_id,section_id, time, enrolled, max_enrolled, room_no) VALUES(
            '".$course_id."',
            '".$section_id."',
            '".$time."',
            '".$enrolled."',
            '".$max_enrolled."',
            '".$room_no."'
            )"
        );


        $page->addQuery("message", "Instructor has been assigned.");
        $page->redirectToMenu();
}
    else { //No Post, display page.
    $page = new Page("Select Position");
    $page->showHeader();

    echo newForm(
        "course", //Form Id
        $page->getPage(), //Form Action
        "Assign instructor for a section", //Title
        array(
            formItem(1, "Semester", "semester"),
            formItem(2, "Course ID", "course_id"),
            formItem(3, "Section number", "section_id"),
            formItem(4, "Instructor's ID", "instructor_id"),
            formItem(5, "Course Time (Ex: 9:00 AM)", "time"),
            formItem(6, "Section's Capacity", "max_enrolled"),
            formItem(7, "Total Enrolled", "enrolled"),
            formItem(8, "Section's Room Number", "room_no")
        )
    );
    $page->showFooter();
    }

?>















