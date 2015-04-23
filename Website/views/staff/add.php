<?php
    $page = new Page("Add Professor");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $name = $_POST["name"];
        $title = $_POST["title"];
        $join_date = $_POST["join_date"];
        $status = $_POST["status"]; //This really should be a yes or no value, but hey, it works :D

        switch ($title) { //really should be enumerated.
            case 1:
                $title = "Professor";
                break;
            case 2:
                $title = "FTI";
                break;
            default:
                $title = "GPTI";
        }

        switch ($status) {
            case 1:
                $status = "Not Applicable";
                break;
            case 2:
                $status = "Non Tenured";
                break;
            default:
                $status = "Tenured";
        }

        $DB->execute(
            "INSERT INTO Instructors (name, join_date, type, tenure) VALUES(
            '".$name."',
            '".$join_date."',
            '".$title."',
            '".$status."'
            )"
        );


        $page->addQuery("message", "Added Instructor");
        $page->redirectToMenu();

    } else { //No Post, display page.
        $page->showHeader();

         echo  newForm(
            "add_prof",
            $page->getPage(),
            "Faculty / Staff (Add a professor)",
            array(
                formItem(1, "Name", "name"),
                optionItem(2, "Title", "title",
                    array(1, 2, 3),
                    array("Professor", "FTI", "GPTI")
                ),
                formItem(3, "Semester of Joining Date", "join_date"),
                optionItem(2, "Status", "status",
                    array(1, 2, 3),
                    array("Not Applicable", "Non Tenured", "Tenured")
                ),
            )
        );

        $page->showFooter();
    }

?>


