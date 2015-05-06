<?php
    $page = new Page("Select Summer Classes for the Past n Years");
    $page->showHeader();

    if(isset($_POST['submit'])) {
        $year = $_POST['year'];

        $title = "Summer Courses for the past ".$year." Years";
        $headerValues = array("Semester", "Instructor", "CRN", "Course Description", "Enrollment");
        $rowValues = array();

        $result = $DB->execute("SELECT * FROM Semesters WHERE (season = 'Summer I' OR season = 'Summer II') AND (year >= YEAR(CURDATE()) - ".$year." AND year <= YEAR(CURDATE()))");

        foreach($result->fetchAll() as $sem) {
            $semester = $sem['season'].' '.$sem['year'];
            $sem_id = $sem['id'];

            foreach($DB->execute("SELECT * FROM Sections WHERE semester_id = '".$sem_id."'")->fetchAll() as $section) { //doest need to be a foreach..its late.


                $section_id = $section['id'];
                $enrollment = $section['enrolled'].'/'.$section['max_enrolled'];

                $course_section = $DB->execute("SELECT * FROM Course_sections WHERE section_id = '".$section_id."'")->fetchRow();
                $course_id = $course_section['course_id'];
                $course_section_id = $course_section['id'];

                $course = $DB->execute("SELECT * FROM Courses WHERE id = '".$course_id."'")->fetchRow();

                $instructor = $DB->execute("SELECT instructor_id FROM Assigned_to WHERE course_section_id = '".$course_section_id."'")->fetchRow()['instructor_id'];
                $instructor = $DB->execute("SELECT name FROM Instructors WHERE instructor_id = '".$instructor."'")->fetchRow()['name'];

                $course_desc = $course['description'];
                $course_crn = $course['crn'];

                for($i = 0; $i<$result->numRows(); $i++) {

                    $tmp = array($i =>
                        array(
                            $semester,
                            $instructor,
                            $course_crn,
                            $course_desc,
                            $enrollment
                        )
                    );

                    $rowValues = array_merge($rowValues, $tmp);
                }

            }

        }

        results($title, $headerValues, $rowValues);


    } else {
        echo newForm(
            "summer_info",
            $page->getPage(),
            "Summer Classes Information",
            array(
                formItem(2, "For the Past n Year", "year")
            )
        );
    }

    $page->showFooter();

?>


