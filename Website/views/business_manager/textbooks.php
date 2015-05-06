<?php
    $page = new Page("Textbooks by Professor");

    if(isset($_GET['set_prof'])) { //The Submit button has been pressed. Process the form.
        $page->removeQuery("set_prof");
        $page->addQuery("professor_id", $_POST['instructor_id']);
        $page->redirect();
    } else if(isset($_GET['professor_id']) && !isset($_GET['disp'])) {
        $page->showHeader();
        $page->addQuery("disp", true);

        $professor_id = $_GET['professor_id'];
        $professor = $DB->execute("SELECT name FROM Instructors WHERE instructor_id = '" . $professor_id . "'")->fetchRow()['name'];

        $crn = buildArrays($DB->execute("SELECT id, crn FROM Courses")->fetchAll(), "id", "crn");

        echo newForm(
            "crn_prof",
            $page->getPage(),
            "Textbooks by CRN for Professor: " . $professor,
            array(
                optionItem(1, "Select a Course Number", "crn", $crn[0], $crn[1])
            )
        );

        $page->showFooter();
    } else if(isset($_GET['disp'])) {
        if(isset($_POST['crn'])) {
            $page->showHeader();

            $professor_id = $_GET['professor_id'];
            $course_id = $_POST['crn'];

            $rowValues = array();
            $values = $DB->execute("SELECT instructor_id, course_id, book_title, author, edition, isbn, publisher FROM Textbook WHERE course_id = '" . $course_id . "' AND instructor_id = '" . $professor_id . "'")->fetchAll();

            $courseName = $DB->execute("SELECT description FROM Courses WHERE id = '".$course_id."'")->fetchRow()['description'];
            $profName = $DB->execute("SELECT name FROM Instructors WHERE instructor_id = '".$professor_id."'")->fetchRow()['name'];

            for($i=0; $i<sizeof($values); $i++) {
                $tmp = array( $i =>
                    array(
                        $profName,
                        $courseName,
                        $values[$i]["book_title"],
                        $values[$i]["author"],
                        $values[$i]["edition"],
                        $values[$i]["isbn"],
                        $values[$i]["publisher"]
                    )
                );
                $rowValues = array_merge($rowValues, $tmp);
            }



            results(
                "Books for Course: " . $courseName . " For Professor: " . $profName,
                array("Instructor", "Course", "Title", "Author", "Edition", "ISBN", "Publisher"),
                $rowValues
            );


            $page->removeQuery("professor_id");
            $page->removeQuery("disp");

            $page->showFooter();
        } else {
            $page->removeQuery("professor_id");
            $page->removeQuery("disp");
            $page->redirect();
        }
    } else { //No Post, display page.
        $page->showHeader();

        $page->addQuery("set_prof", true);

        $ins = buildArrays($DB->execute("SELECT instructor_id, name FROM Instructors")->fetchAll(), "instructor_id", "name");
        echo newForm(
            "textbooks_prof",
            $page->getPage(),
            "Textbooks by Professor",
            array(
                optionItem(1, "Instructor", "instructor_id", $ins[0], $ins[1])
            )
        );

        $page->showFooter();
    }


?>








