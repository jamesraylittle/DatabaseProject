<?php
    $page = new Page("Display Course Offerings");
    $page->showHeader();


    if(isset($_POST['submit'])) {
        $course_id = $_POST["course_id"];

        $course = $DB->execute("SELECT * FROM Courses WHERE id = '".$course_id."'")->fetchRow();

        $n = $_POST['year'];

        $headerValues = array("ID", "Name", "Description", "CRN", "Required", "Special", "Section Number", "Instructor", "Enrollment", "Date");
        $rowValues = array();
        $title = "Course Offerings For ".$course['name'].", for the last ".$n." years";

        $i = 0;
        foreach($DB->execute("SELECT * FROM Course_sections WHERE course_id = '".$course_id."'")->fetchAll() as $row) {
            $section_id = $row['section_id'];
            foreach($DB->execute("SELECT * FROM Sections WHERE id = '".$section_id."' ORDER BY number DESC")->fetchAll() as $section) {

                //Why not :) - I mean, other than readability...
                $instructor = $DB->execute("SELECT name FROM Instructors WHERE instructor_id = '" . $DB->execute("SELECT instructor_id FROM Assigned_to WHERE course_section_id = '" . $row['id'] . "'")->fetchRow()['instructor_id'] . "'")->fetchRow()['name'];

                $enrollment = $section['enrolled'].'/'.$section['max_enrolled'];

                $semester = $DB->execute("SELECT * FROM Semesters WHERE id = '".$section['semester_id']."' AND year >= YEAR(CURDATE())-".$n." AND year <= YEAR(CURDATE())")->fetchRow();

                if(sizeof($semester) > 0) {
                    $semester = $semester['season'] . ' ' . $semester['year'];

                    $rowValues = array_merge
                    (
                        $rowValues,
                        array($i =>
                            array(
                                $course["id"],
                                $course["name"],
                                $course["description"],
                                $course["crn"],
                                $course["required"],
                                $course["special"],
                                $section["number"],
                                $instructor,
                                $enrollment,
                                $semester
                            )
                        )
                    );

                    $i++;
                }
            }
        }

        results($title, $headerValues, $rowValues);

    } else { //No Post, display page.

        $array = buildArrays($DB->execute("SELECT id, description FROM Courses")->fetchAll(), "id", "description");

        echo newForm(
            "courses_offerings",
            $page->getPage(),
            "Course Offering for Last n Years",
            array(
                optionItem(1, "Course", "course_id", $array[0], $array[1]),
                formItem(2, "Years", "year")
            )
        );

    }

    $page->showFooter();
?>








