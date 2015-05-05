<?php
    $page = new Page("Select Position");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $course_id = $_POST["course_id"];

        $page->addQuery("course_id", $course_id);
        $page->redirect();
    } else if(isset($_GET["course_id"])) {
        $course_id = $_GET['course_id'];
        $page->showHeader();

        $result = $DB->execute("SELECT * FROM Courses WHERE course_id = '".$course_id."'")->fetchAll();
echo ("Course assigned <br>");
               foreach($result as $row) {
             $result = $DB->execute("SELECT * FROM Course_Sections WHERE course_id = '".$row["course_id"]."'")->fetchAll();
               
               foreach($result as $row) {
                echo($row["course_id"]);
              echo (" is offered in  ");
              echo($row["semester"]);
              echo ("<br>");
        }
    
        }

        



        $page->showFooter();
    } else { //No Post, display page.
    $page = new Page("Courses Offerings");
    $page->showHeader();

    echo newForm(
        "courses_offerings",
        $page->getPage(),
        "Last 5 years Courses",
        array(
            formItem(1, "Course ID", "course_id"),
        )
    );


    $page->showFooter();
    }

?>








