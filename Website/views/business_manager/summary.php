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
echo ("Course assigned <br><br>");

echo ("Course ID  and Ratio between total students enrolled and TA hours.<br><br>");
        foreach($result as $row) {

               $result = $DB->execute("SELECT * FROM Course_Sections WHERE section_id = '".$row["section_id"]."'")->fetchAll();

               foreach($result as $row) {
             $result = $DB->execute("SELECT * FROM Courses WHERE course_id = '".$row["course_id"]."'")->fetchAll();
               
        

               $result = $DB->execute("SELECT * FROM Sections WHERE course_id = '".$row["course_id"]."'")->fetchAll();

                foreach($result as $row) {
                echo($row["course_id"]);
              echo(".  Ratio: ");
                $ratio = ($row["enrolled"]) / 40;
                echo($ratio);
              echo("<br>");
          


        }

        }
        break; 
        }

        



        $page->showFooter();
    } else { //No Post, display page.
    $page = new Page("Summary Information");
    $page->showHeader();

    echo newForm(
        "summary_nformation",
        $page->getPage(),
        "Summary Information",
        array(
            formItem(1, "Instructor's ID", "instructor_id"),
        )
    );


    $page->showFooter();
}
?>
