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
              echo (":  ");
              echo($row["catalog_year"]);
              echo ("<br>");
        }
        }
        }

        



        $page->showFooter();
    } else { //No Post, display page.
    $page = new Page("Taught in Years");
    $page->showHeader();

    echo newForm(
        "list courses",
        $page->getPage(),
        "Last 5 years Courses",
        array(
            formItem(1, "Instructor's ID", "instructor_id"),
        )
    );


    $page->showFooter();
    }

?>








