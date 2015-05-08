<?php
    $page = new Page("Select Position");
 //No Post, display page.
    
        $page->showHeader();

        
echo ("Statistics <br> <br>");


               $result = $DB->execute("SELECT * FROM Sections")->fetchAll();
        foreach($result as $row) {
            echo($row["course_id"]);
            echo(": ");
              echo($row["enrolled"]);
              echo ("<br>");
     
        
    }
               
              $page->showFooter();
    
?>


