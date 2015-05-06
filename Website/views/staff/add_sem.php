<?php
$page = new Page("Add Semester");


if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
    //Making assumptions about if the values are set and are "valid".
    unset($_POST['submit']);

    $year = $_POST["year"];
    if(empty($year)) $year = 2015;

    switch ($_POST['season']) { //really should be enumerated.
        case 1:
            $season = "Fall";
            break;
        case 2:
            $season = "Spring";
            break;
        case 3:
            $season = "Summer I";
            break;
        case 4:
            $season = "Summer II";
            break;
        default:
            $season = "Winter";

    }

    $exists = sizeof($DB->execute("SELECT id FROM Semesters WHERE year = '".$year."' AND season = '".$season."' ")->fetchRow()) > 0;

    if ($exists)
        $page->addQuery("message", "Did not Add Semester, Already Exists.");
    else {

        $DB->execute("INSERT INTO Semesters (season, year) VALUES('" . $season . "', '" . $year . "')");
        $page->addQuery("message", "Added Semester" . $exists);

    }

    $page->redirect();

} else { //No Post, display page.
    $page->showHeader();

    echo  newForm(
        "add_sem",
        $page->getPage(),
        "Add a Semester",
        array(
            optionItem(1, "Season", "season",
                array(1, 2, 3, 4, 5),
                array("Fall", "Spring", "Summer I", "Summer II", "Winter")
            ),
            formItem(3, "Catalog Year", "year"),
        )
    );

    $headerValues = array("Season", "Year");

    $rowValues = $DB->execute("SELECT season, year FROM Semesters")->fetchAll();

    echo '<div id="form_container"><p style="margin-left:2px; font-weight: bold;">Semesters</p>'
        . newTable($headerValues, $rowValues)
         . '</div>';




    $page->showFooter();
}

?>


