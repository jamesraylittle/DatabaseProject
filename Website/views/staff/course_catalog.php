<?php
    $page = new Page("Course Catalog");
    $page->showHeader();

    if(isset($_POST['submit'])) { //The Submit button has been pressed. Process the form.
        //Making assumptions about if the values are set and are "valid".
        $year = $_POST["year"];

        $headerValues = array("Course ID", "Course Name", "Course Description", "CRN", "Required?", "Special?", "Semester", "Section");
        $rowValues = array();

        foreach($DB->execute("SELECT * FROM Semesters WHERE year = '".$year."'")->fetchAll() as $row) {

            $semester = $row['season'] . ' ' . $year;

            foreach($DB->execute("SELECT * FROM Sections WHERE semester_id = '".$row['id']."'")->fetchAll() as $section) {

                $number = $section['number'];

                foreach($DB->execute("SELECT * FROM Course_sections WHERE section_id = '".$section['id']."'")->fetchAll() as $course_sec)

                    $values = $DB->execute("SELECT * FROM Courses WHERE id = '".$course_sec['course_id']."'")->fetchAll();

                    for($i = 0; $i<sizeof($values); $i++) {
                        $values[$i]["semester"] = $semester;
                        $values[$i]["number"] = $number;
                    }

                    $rowValues = array_merge($rowValues, $values);
            }
        }

        results("Courses for year: " . $year, $headerValues, $rowValues);



    } else { //No Post, display page.

        $array = buildArray($DB->execute("SELECT DISTINCT(year) as year FROM Semesters ORDER BY year DESC")->fetchAll(), "year");

        echo newForm(
            "course", //Form Id
            $page->getPage(), //Form Action
            "Course Catalog Year", //Title
            array(
                optionItem(1, "Catalog Year", "year", $array, $array)
            )
        );

    }

    $page->showFooter();

?>


