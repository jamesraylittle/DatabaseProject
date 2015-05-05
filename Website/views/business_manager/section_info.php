<?php
    $page = new Page("Select Position");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $id = $_POST["section_id"];
        $year = $_POST["year"];
        $page->addQuery("id", $id);
        $page->addQuery("year", $year);
        $page->redirect();
    } else if(isset($_GET["id"])) {
        $id = $_GET['id'];
        $year = $_GET['year'];
        $page->showHeader();

        $result = $DB->execute("SELECT * FROM Sections WHERE section_id = '".$id."'")->fetchAll();
echo ("Special Courses <br>");
        foreach($result as $row) {
               $result = $DB->execute("SELECT * FROM Course_Sections WHERE course_id = '".$row["course_id"]."'")->fetchAll();
             $result = $DB->execute("SELECT * FROM Courses WHERE course_id = '43311'")->fetchAll();
               
               foreach($result as $row) {
                echo($row["course_id"]);
              echo (":-----    ");
              echo($row["name"]);
              echo (":  ");
              echo($row["catalog_year"]);
              echo ("<br>");
        
    
        }


        $result = $DB->execute("SELECT * FROM Courses WHERE course_id = '43312'")->fetchAll();
               
               foreach($result as $row) {
                echo($row["course_id"]);
              echo (":-----    ");
              echo($row["name"]);
              echo (":  ");
              echo($row["catalog_year"]);
              echo ("<br>");
        
    
        }
        $result = $DB->execute("SELECT * FROM Courses WHERE course_id = '43313'")->fetchAll();
               
               foreach($result as $row) {
                echo($row["course_id"]);
              echo (":-----    ");
              echo($row["name"]);
              echo (":  ");
              echo($row["catalog_year"]);
              echo ("<br>");
        
    
        }
        $result = $DB->execute("SELECT * FROM Courses WHERE course_id = '43314'")->fetchAll();
               
               foreach($result as $row) {
                echo($row["course_id"]);
              echo (":-----    ");
              echo($row["name"]);
              echo (":  ");
              echo($row["catalog_year"]);
              echo ("<br>");
        
    
        }
        $result = $DB->execute("SELECT * FROM Courses WHERE course_id = '43315'")->fetchAll();
               
               foreach($result as $row) {
                echo($row["course_id"]);
              echo (":-----    ");
              echo($row["name"]);
              echo (":  ");
              echo($row["catalog_year"]);
              echo ("<br>");
        
    
        }
        $result = $DB->execute("SELECT * FROM Courses WHERE course_id = '43316'")->fetchAll();
               
               foreach($result as $row) {
                echo($row["course_id"]);
              echo (":-----    ");
              echo($row["name"]);
              echo (":  ");
              echo($row["catalog_year"]);
              echo ("<br>");
        
    
        }
        

        

}

        $page->showFooter();
    } else { //No Post, display page.
    $page = new Page("Section Information");
    $page->showHeader();

    echo newForm(
        "section_info",
        $page->getPage(),
        "Enter Section Information",
        array(
            formItem(1, "Section ID", "section_id"),
            formItem(2, "Number of years", "year"),
        )
    );

    $page->showFooter();
    }

?>



