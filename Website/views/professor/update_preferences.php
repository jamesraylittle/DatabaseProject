<?php
    $page = new Page("Update Preferences");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
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
}
    else { //No Post, display page.
    $page = new Page("Update Preferences");
    $page->showHeader();

    echo newForm(
       "update_pref",
        $page->getPage(),
        "Update Preferences",
        array(
            formItem(1, "Instructor's ID", "instructor_id"),
            formItem(2, "Course Preferences to Teach", "course_id"),
            formItem(3, "Course Year to Teach", "year"),
            formItem(4, "Enter load distribution (Eg: Spring or Fall or Equal)", "loads")
        )
    );

    $page->showFooter();
    }

?>