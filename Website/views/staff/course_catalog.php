<?php
    $page = new Page("Select Position");


    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $semester = $_POST["semester"];
        
        $DB->execute(
            "INSERT INTO Course_Sections (course_id, section_id, semester) VALUES(
            '".$course_id."',
            '".$section_id."',
            '".$semester."'
            )"

  );

        $page->addQuery("message", "Instructor has been assigned.");
        $page->redirectToMenu();
}
    else { //No Post, display page.
    $page = new Page("Course Catalog");
    $page->showHeader();

    echo newForm(
        "course", //Form Id
        $page->getPage(), //Form Action
        "Course Catalog Year", //Title
        array(
            formItem(1, "Catalog Year", "catalog_year") //Form input field
        )
    );

    $page->showFooter();
    }

?>


