<?php
    $page = new Page("Add Special Request");

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


        $page->addQuery("message", "Special Request Added.");
        $page->redirectToMenu();

    } else { //No Post, display page.
        $page = new Page("Add Special Request");
        $page->showHeader();

        $ins = buildArrays($DB->execute("SELECT instructor_id, name FROM Instructors")->fetchAll(), "instructor_id", "name");
        $course = buildArrays($DB->execute("SELECT id, description FROM Courses")->fetchAll(), "id", "description");

        echo newForm(
            "special_request",
            $page->getPage(),
            "Input Special Request",
            array(
                optionItem(1, "Instructor", "instructor_id", $ins[0], $ins[1]),
                optionItem(2, "Course", "course_id", $course[0], $course[1]),
                formItem(3, "Title", "title"),
                formItem(4, "Arguments", "arguments")
            )
        );

        $page->showFooter();
    }

?>




