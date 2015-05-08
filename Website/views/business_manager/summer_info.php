<?php
    $page = new Page("Select Position");
 //No Post, display page.
    
        $page->showHeader();

        
echo ("Classes offered in Summer <br> <br>");

               $result = $DB->execute("SELECT * FROM Course_Sections WHERE semester = '"."Summer 2015"."'")->fetchAll();
        foreach($result as $row) {
              foreach($result as $row) {
             $result = $DB->execute("SELECT * FROM Courses WHERE course_id = '".$row["course_id"]."'")->fetchAll();
               
               foreach($result as $row) {
              echo($row["name"]);
              echo ("<br>");
        }

        }
        break;
        
    }
               
              $page->showFooter();
    
?>


