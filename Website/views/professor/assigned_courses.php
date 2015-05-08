<?php
    $page = new Page("Select Position");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $id = $_POST["instructor_id"];

        $page->addQuery("id", $id);
        $page->redirect();
    } else if(isset($_GET["id"])) {
        $id = $_GET['id'];
        $page->showHeader();

        $result = $DB->execute("SELECT * FROM Assigned_to WHERE instructor_id = '".$id."'")->fetchAll();
echo ("Course assigned <br>");
        foreach($result as $row) {

               $result = $DB->execute("SELECT * FROM Course_Sections WHERE section_id = '".$row["section_id"]."'")->fetchAll();

               foreach($result as $row) {
             $result = $DB->execute("SELECT * FROM Courses WHERE course_id = '".$row["course_id"]."'")->fetchAll();
               
               foreach($result as $row) {
              echo($row["name"]);
              echo ("<br>");
        }
        }
        }

        



        $page->showFooter();
    } else { //No Post, display page.
    $page = new Page("Course assigned ");
    $page->showHeader();

    echo newForm(
        "Courses Assigned", //Form Id
        $page->getPage(), //Form Action
        "Course assigned", //Title
        array(
            formItem(1, "Instructor ID", "instructor_id") //Form input field
        )
    );

    $page->showFooter();
    }

?>


