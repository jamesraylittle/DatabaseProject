<?php
    $page = new Page("Section Information");
    $page->showHeader();

    if(isset($_POST['submit'])) {
        $limit = $_POST['limit'];

        $rowValues = array();
        $headerValues = array("Title", "Instructor", "Offered Date", "Enrollment");

        $i = 0;
        foreach($DB->execute("SELECT * FROM Courses WHERE special = 1")->fetchAll() as $courses) {
            $title = $courses['description'];
            $course_id = $courses['id'];

            $course_sec = $DB->execute("SELECT * FROM Course_sections WHERE course_id = '".$course_id."'")->fetchRow();
            $section = $DB->execute("SELECT * FROM Sections WHERE id = '".$course_sec['section_id']."'")->fetchRow();

            if(sizeof($section) > 0 && $i < $limit) {
                $enrollment = $section['enrolled'] . "/" . $section['max_enrolled'];

                $offered_date = $DB->execute("SELECT * FROM Semesters WHERE id = '" . $section['semester_id'] . "'")->fetchRow();
                $offered_date = $offered_date['season'] . ' ' . $offered_date['year'];

                $instructor = $DB->execute("SELECT * FROM Assigned_to WHERE course_section_id = '" . $course_sec['id'] . "'")->fetchRow()['instructor_id'];
                $instructor = $DB->execute("SELECT * FROM Instructors WHERE instructor_id = '" . $instructor . "'")->fetchRow()['name'];

                $rowValues = array_merge($rowValues,
                    array($i => array($title, $instructor, $offered_date, $enrollment))
                );

                $i++;
            }
        }

        results("Sections for Special Courses", $headerValues, $rowValues);


    } else { //No Post, display page.

        echo newForm(
            "section_info",
            $page->getPage(),
            "Enter Display Limit",
            array(
                formItem(1, "Limit", "limit")
            )
        );


    }

    $page->showFooter();

?>



