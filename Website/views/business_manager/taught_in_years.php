<?php
    $page = new Page("Courses Taught the Last n Years");

    $page->showHeader();

    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.

        $id = $_POST["instructor_id"];
        $n = $_POST["n"];
        $professorName = $DB->execute("SELECT name FROM Instructors WHERE instructor_id = '$id'")->fetchRow();
        $professorName = $professorName["name"];
        $course_sections = $DB->execute("SELECT course_section_id FROM Assigned_to WHERE instructor_id = '".$id."'")->fetchAll();


        $title = "";
        $tableRows = array();
        $headerValues = array();
        $i = 0;

        if(isset($_POST['special'])) { //the checkbox was checked..
            /* Special Data: (instructor, N)
             * (Display # of Distinct Courses) w/ times a course is repeated, average enrollment of this course,
             * average TA hours for course and ratio (average TA hours / average enrollment)
             * Show undergrad courses 1st, then graduate 2nd; Have clear sep.
             */

            $title = "Special Information for Instructor: " . $professorName;
            $headerValues = array(
                "Subject",
                "Code",
                "Repeated",
                "Average Enrollment",
                "Average TA Hours",
                "Ratio"
            );

            function getSemesterYear($semesterId, $n, $DB) {
                return $DB->execute("SELECT year FROM Semesters WHERE (id = '".$semesterId."') AND (year >= (YEAR(CURDATE())  - ".$n.") AND year <= (YEAR(CURDATE()) ) )")->fetchRow()['year'];
            }

            function getSemesterYrBySectionId($sectionId, $n, $DB) {
                $semId = $DB->execute("SELECT semester_id FROM Sections WHERE id = '".$sectionId."' ")->fetchRow()["semester_id"];
                return getSemesterYear($semId, $n, $DB);
            }

            function filterCourseSectionIds($courseSectionIds, $n, $DB) { //removes ids that are not in the given N year range
                $validIds = array();
                for($i = 0; $i<sizeof($courseSectionIds); $i++) {
                    $id = $courseSectionIds[$i];
                    if(getSemesterYear(getSection($id, $DB)['semester_id'], $n, $DB) > 0) { //valid
                        $validIds[sizeof($validIds)] = $id;
                    }
                }

                return $validIds;
            }

            function getSection($course_section_id, $DB) {
                $section_id = $DB->execute("SELECT * FROM Course_sections WHERE id = '".$course_section_id."'")->fetchRow()['section_id'];
                return $DB->execute("SELECT * FROM Sections WHERE id = '".$section_id."'")->fetchRow();
            }

            function getCourse($course_section_id, $DB) {
                $course_id = $DB->execute("SELECT * FROM Course_sections WHERE id = '".$course_section_id."'")->fetchRow()['course_id'];
                return $DB->execute("SELECT * FROM Courses WHERE id = '".$course_id."'")->fetchRow();
            }

            function getTasHrs($section_id, $DB) {
                $tas = array();
                $taIds = $DB->execute("SELECT * FROM TA_Assigned_to WHERE section_id = '".$section_id."' ")->fetchAll();
                foreach($taIds as $v) {
                    $hr = $DB->execute("SELECT hours FROM TAs WHERE id = '".$v['ta_id']."'")->fetchRow();
                    if(sizeof($hr) > 0)
                        $tas[sizeof($tas)] = $hr['hours'];
                }
                return $tas;
            }

            function calcAvg($value = array()) {
                $total = 0;
                $count = 0;
                foreach($value as $v) {
                    $total += $v;
                    $count++;
                }
                if($count == 0)
                    return 0;
                else
                    return ($total/$count);
            }

            //Calculating # of Dist Courses.
            $courseSectionIds = array();
            $result = $DB->execute("SELECT course_section_id FROM Assigned_to WHERE instructor_id = '".$id."'")->fetchAll();
            for($i = 0; $i<sizeof($result); $i++)
                $courseSectionIds[$i] = $result[$i]['course_section_id']; //List of course_section_ids for Professor to a given course

            $numDist = $DB->execute("SELECT COUNT(DISTINCT(course_id)) AS C FROM Course_sections WHERE id IN ". arrayToString($courseSectionIds))->fetchRow()['C'];
            //End Calculating.

            $courseSectionIds = filterCourseSectionIds($courseSectionIds, $n, $DB);
            $course_sections = $DB->execute("SELECT * FROM Course_sections WHERE id IN ".arrayToString($courseSectionIds)." GROUP BY course_id")->fetchAll();

            $i = 0;
            $values = array();
            foreach($course_sections as $cs) { //getting subject and code from courses
                //$section_ids[sizeof($section_ids)] = $cs['section_id'];

                $course = $DB->execute("SELECT * FROM Courses WHERE id = '".$cs['course_id']."'")->fetchRow();

                $values[$i]['subject'] = $course['subject'];
                $values[$i]['code'] = $course['level'];
                $values[$i]['section_id'] = $cs['section_id'];

                $i++;
            }


            for($i = 0; $i<sizeof($values); $i++) {
                $value = $values[$i];
                $section_id = $value['section_id'];

                $avgHrs = calcAvg(getTasHrs($section_id, $DB));

            }




            //Calculating Average TA Hours for a Course in a Given Year for a Given Professor..


            //End Calculating.





//            foreach($course_sections as $assignedTo) {
//                $course_section_id = $assignedTo['course_section_id'];
//                $course_section = $DB->execute("SELECT DISTINCT(course_id) as course_id FROM Course_sections")->fetchAll();
//                echo $course_section_id .' '. $course_section[0]['course_id'] . '<br />';
//            }

            //echo "<p>Number of Distinct Courses for the last ".$n." years: <b>".$numDist."</b></p>";

        } else {
            /* Non Special Data: (instructor, N)
             * List all courses (course_code, title, semester, enrollment, building) in DESC order
             * that the instructor has taught in the last N years.
             */
            $title = "Displaying Courses for the last " . $n . " years, for Instructor: " . $professorName;
            $headerValues = array(
                "Subject", //level
                "Course Code", //subject
                "Semester", //Fall 2015
                "Enrollment",
                "Building & Room Number"
            );

            foreach($course_sections as $assignedTo) {
                $course_section_id = $assignedTo['course_section_id'];
                foreach($DB->execute("SELECT * FROM Course_sections WHERE id = '".$course_section_id."'")->fetchAll() as $course_section) {
                    $section_id = $course_section['section_id'];
                    $section = $DB->execute("SELECT * FROM Sections WHERE id = '".$section_id."'")->fetchRow();

                    $semester_id = $section['semester_id'];
                    $semester = $DB->execute("SELECT * FROM Semesters WHERE (id = '".$semester_id."') AND (year >= (YEAR(CURDATE()) - ".$n.") AND year <= YEAR(CURDATE()))")->fetchRow();
                    if(sizeof($semester) > 0) {  //if in the last N years
                        $sem_name = $semester['season'].' '.$semester['year'];

                        $enrolled = $section['enrolled'];
                        $room_n = $section['room_no'];

                        $course_id = $course_section['course_id'];
                        $course = $DB->execute("SELECT * FROM Courses WHERE id = '".$course_id."'")->fetchRow();

                        $subject = $course['subject'];
                        $course_code = $course['level'];

                        $tableRows = array_merge($tableRows, array($i => array($subject, $course_code, $sem_name, $enrolled, $room_n)));
                    }
                }
            }

        } //END ELSE

        results($title, $headerValues, $tableRows);

    } else { //No Post, display page.

        //getting instructors ids from the database.
        $array = buildArrays($DB->execute("SELECT instructor_id, name FROM Instructors")->fetchAll(), "instructor_id", "name");



        echo newForm(
            "list courses",
            $page->getPage(),
            "Display Last n Years Courses / Special Information",
            array(
                optionItem(1, "Instructor", "instructor_id", $array[0], $array[1]),
                formItem(2, "Number (n)", "n"),
                formCheckBox(3, "Display Special Information?*", "special", "true", $checked = false)
            )
        );

        echo '<div id="form_container"><p style="margin-left:2px; font-weight: bold;">*Display Special Information:</p>' .newList(
            array(
                'The number of distinct courses with times a course is repeated',
                'Average enrollment of the course',
                'Average TA hours (per week) for this course',
                'The ratio between the avage TA hours and the average enrollment of this course.'
            )
        ) . '</div>';


    }

    $page->showFooter();

?>









