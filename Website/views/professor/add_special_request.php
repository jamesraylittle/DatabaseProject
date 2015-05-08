<?php
    $page = new Page("Add Textbook");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $instructor_id = $_POST["instructor_id"];
        $course_id = $_POST["course_id"];
        $title = $_POST["title"];
        $arguments = $_POST["arguments"]; 

        $DB->execute(
            "INSERT INTO Special_Request ( instructor_id, course_id, title, arguments) VALUES(
            '".$instructor_id."',
            '".$course_id."',
            '".$title."',
            '".$arguments."'
            )"

  );


        $page->addQuery("message", "Textbook has been added.");
        $page->redirectToMenu();
}
    else { //No Post, display page.
    $page = new Page("Add Special Request");
    $page->showHeader();

    echo newForm(
        "special_request",
        $page->getPage(),
        "Input Special Request",
        array(
            formItem(1, "Instructor's ID", "instructor_id"),
            formItem(2, "Course Code", "course_id"),
            formItem(3, "Title", "title"),
            formItem(4, "Arguments", "arguments")
        )
    );

    $page->showFooter();
    }

?>




