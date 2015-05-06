<?php
    $page = new Page("Statistics");
    $page->showHeader();

    if(isset($_POST['submit'])) {
        $n = $_POST['years'];
        $semester_ids = $DB->execute("SELECT id FROM Semesters WHERE (season = 'Fall' OR season = 'Spring') AND (year >= YEAR(CURDATE()) - ".$n." AND year <= YEAR(CURDATE()))");

        //Part i. - For each course, total enrollment for each regular semester (fall or spring) in the last n years

        //Part ii - For each level (1000 - 5000), total enrollment for each regular semester (fall or spring) in the last n years

        $headerValues = array(1000, 2000, 3000, 4000, 5000, "All");
        $rowValues = array();

        $title = "Total Enrollment courses in the past " . $n . " years.";

        $totals = array
        (
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            "all" => 0
        );

        foreach ($semester_ids->fetchAll() as $v) {
            $semesterId = $v['id'];
            foreach($DB->execute("SELECT * FROM Sections WHERE semester_id = '".$semesterId."'")->fetchAll() as $section) {

                $enrolled = $section['enrolled'];
                $sectionId = $section['id'];

                foreach($DB->execute("SELECT * FROM Course_sections WHERE section_id = '".$sectionId."'")->fetchAll() as $course_sec) {
                    $courseId = $course_sec['course_id'];
                    $course = $DB->execute("SELECT * FROM Courses WHERE id = '".$courseId."'")->fetchRow();
                    $level = $course["level"];

                    $totals[$level[0]] += $enrolled;
                    $totals["all"] += $enrolled;
                }

            }

        }

        results($title, $headerValues, array(0 => $totals));

    } else {

        echo newForm(
            "stats",
            $page->getPage(),
            "Statistics",
            array(
                formItem(1, "How many years to collect statistics?", "years")
            )
        );

    }

    $page->showFooter();
?>
