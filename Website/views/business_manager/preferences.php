<?php
    $page = new Page("Select Position");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $year = $_POST["year"];

        $page->addQuery("year", $year);
        $page->redirect();
    } else if(isset($_GET["year"])) {
        $year = $_GET['year'];
        $page->showHeader();

        $result = $DB->execute("SELECT * FROM instructor_preference WHERE year = '".$year."'")->fetchAll();
echo ("Preferences of all professors <br><br>");

               foreach($result as $row) {
                echo ("Instructor ID:  ");
            echo($row["instructor_id"]);
              echo ("     Course id:  ");
              echo($row["course_id"]);
              echo ("    Year:  ");
              echo($row["year"]);
              echo ("     Load:  ");
              echo($row["loads"]);
              echo ("<br>");
        
        
        }


        



        $page->showFooter();
    } else { //No Post, display page.
    $page = new Page("Preferences");
    $page->showHeader();

    echo newForm(
        "Preferences",
        $page->getPage(),
        "Preferences",
        array(
            formItem(1, "Enter year", "year"),
        )
    );


    $page->showFooter();
    }

?>








