<?php
    //Generic Functions that make generating HTML easier..
    function menuItem($title, $tabIndex, $link) {
        echo '
            <a href="'.$link.'" tabindex="'.$tabIndex.'"style="text-decoration:none">
                <span style="font-family:Cursive;font-size:22px;font-style:normal;font-weight:normal;text-decoration:none;text-transform:none;color:848484;">
                    '.$title.'

                </span>
            </a>
            <br />';
    }

    function formItem($liId, $name, $entityName, $type = "text", $length = 255, $value = "" ) {
        return '
            <li id="li_'.$liId.'" >
                <label class="description" for="'.$entityName.'">'.$name.'</label>
                <div>
                    <input id="'.$entityName.'"name="'.$entityName.'" class="element text medium" type="'.$type.'" maxlength="'.$length.'" value="'.$value.'" />
                </div>
            </li>';
    }


    function optionItem($liId, $title, $entityName, $values = array(), $names = array(), $selectedName = null) {
        //assuming names is the same size of values, and assuming if selected is not null, it exist in names
        $s = '
        <li id="li_'.$liId.'" >
		    <label class="description" for="'.$entityName.'">'.$title.'</label>
		    <div>
		        <select class="element select medium" id="'.$entityName.'" name="'.$entityName.'">';
                    for($i = 0; $i<count($names); $i++) {
                        $s .= '<option value="'.$values[$i].'"';
                        if($names[$i] == $selectedName) $s .= 'selected';
                        $s .= '>'.$names[$i].'</option>';
                    }
        	$s .= '</select>
		    </div>
		</li>';

        return $s;
    }

    function buildArrays($result, $valueKey = "", $nameKey = "") {
        $outArray = array(array(), array());
        for($i=0; $i<sizeof($result); $i++) {
            $outArray[1][$i] = $result[$i][$nameKey];
            $outArray[0][$i] = $result[$i][$valueKey];
        }
        return $outArray;
    }

    function buildArray($result, $valueKey = "") {
        $outArray = array();
        for($i=0; $i<sizeof($result); $i++) {
            $outArray[$i] = $result[$i][$valueKey];
        }
        return $outArray;
    }

    function semesterOption($liId, $DB) {
        $result = $DB->execute("SELECT * FROM Semesters")->fetchAll();
        $outArray = array(array(), array());
        for($i = 0 ; $i<sizeof($result); $i++) {

            $outArray[1][$i] = $result[$i]['season'] . ' ' . $result[$i]['year'];
            $outArray[0][$i] = $result[$i]['id'];
        }
        return optionItem($liId, "Semester", "semester_id", $outArray[0], $outArray[1]);

    }

    function getCourseName($course_id, $DB) {
        $row = $DB->execute("SELECT subject,level FROM Courses WHERE id = '".$course_id."'")->fetchRow();
        return $row['subject'].$row['level'];
    }

    function getSectionNum($section_id, $DB) {
        $row = $DB->execute("SELECT number FROM Sections WHERE id = '".$section_id."'")->fetchRow();
        return $row['number'];
    }

    function arrayToString($arr = array()) {
        $s = "(";
        $len = sizeof($arr);
        for($i = 0; $i<$len; $i++) {
            $s .= $arr[$i];
            if($i + 1 != $len)
                $s .= ",";
        }

        return $s . ")";
    }

    function courseSectionOption($liId, $DB) {
        $result = $DB->execute("SELECT * FROM Course_sections")->fetchAll();
        $outArray = array(array(), array());
        for($i = 0 ; $i<sizeof($result); $i++) {

            $name = getCourseName($result[$i]['course_id'], $DB);
            $num = getSectionNum($result[$i]['section_id'], $DB);

            $outArray[1][$i] = $name.".".$num;
            $outArray[0][$i] = $result[$i]['id'];
        }
        return optionItem($liId, "Course & Section", "course_section_id", $outArray[0], $outArray[1]);

    }

    function toYesNo($value) {
        if($value == "0")
            return "No";
        else
            return "Yes";
    }

    function formTimeItem($liId, $name, $entityName)  {
        return '
        <li id="li_'.$liId.'" >
                <label class="description" for="'.$entityName.'"">'.$name.'</label>
                <span>
                    <input id="hour" name="hour" class="element text " size="2" type="text" maxlength="2" value="" /> :
                    <label>HH</label>
                </span>
                <span>
                    <input id="min" name="min" class="element text " size="2" type="text" maxlength="2" value="" /> :
                    <label>MM</label>
                </span>
                <span>
                    <input id="second" name="second" class="element text " size="2" type="text" maxlength="2" value="" />
                    <label>SS</label>
                </span>
                <span>
                    <select class="element select" style="width:4em" id="am_pm" name="am_pm">
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select>
                    <label>AM/PM</label>
                </span>
            </li>
            ';
    }

    function formButton($name = "submit", $value = "Submit") {
        return '
            <li class="buttons">
				<input id="saveForm" class="button_text" type="submit" name="'.$name.'" value="'.$value.'" />
			</li>';
    }


    function formCheckBox($liId, $name, $entityName, $value, $checked = false) {
        $s = "";
        if($checked)
            $s = "checked";


        return '<li id="li_'.$liId.'" >
                <label class="description" for="'.$entityName.'">'.$name.'</label>
                <div>
                    <input type="checkbox" name="'.$entityName.'" value="'.$value.'" '.$s.'>
                </div>
            </li>';
    }

    function newForm($formId, $action = "", $title, $formItems = array(), $method = "post") {
        $s =  '
        <div id="form_container">
                <h1>'.$title.'</h1>
                <form id="'.$formId.'" class="appnitro"  method="'.$method.'" action="'.$action.'">
                    <div class="form_description">
                        <h2>'.$title.'</h2>
                        <p>'.$title.'</p>
                    </div>
                    <ul>
                ';
                    foreach($formItems as $item) $s .= $item;

                    $s .= formButton();


        $s .= '
                    </ul>
                </form>
            </div>
            ';

        return $s;
    }



    function newList($items = array(), $ol = true) {
        $s = '<ul>';
        $e = '</ul>';
        if($ol) {
            $s = '<ol>';
            $e = '</ol>';
        }

        foreach($items as $v) {
            $s .= '<li align="left">'. $v . '</li>';
        }

        return $s.$e;
    }

    function tableHeader($headerValues) {
        $s = '<tr>';

        foreach($headerValues as $v) {
            $s .= '<th>'. $v . '</th>';
        }

        return $s . '</tr>';
    }
    function tableRow($values) {
        $s = "";

        foreach($values as $v) {
            $key = array_keys($v);
            $s .= '<tr>';
            for($i = 0; $i<sizeof($v); $i++) {

                $s .= '<td>' . $v[$key[$i]] . '</td>';
            }

            $s .= '</tr>';
        }


        return $s;
    }

    function newTable($headerValues, $values) {
        $s = '<table class="tftable" border="1" align="center">';

        $s .= tableHeader($headerValues);
        $s .= tableRow($values);

        return $s . '</table>';
    }

    function dispTitle($title) {
        echo '<h2>'.$title.'</h2>';
    }


    function results($title, $headerValues, $rowValues) {
        if(sizeof($rowValues) > 0) {
            dispTitle($title);
            echo newTable($headerValues, $rowValues);
        } else {
            dispTitle("No Results");
            echo "No Results to display for input.";
        }
    }

    function parseCourseName($course_name) {
        $s = "";
        foreach($course_name as $c) {
            if(is_numeric($c))
                $s.= $c;
        }
        return $s;
    }

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $this->getTitle(); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->getPath(); ?>views/style/view.css" media="all">
    <style type="text/css">
        .tftable {font-size:12px;color:#333333;width:25%;border-width: 1px;border-color: #a9a9a9;border-collapse: collapse;}
        .tftable th {font-size:12px;background-color:#b8b8b8;border-width: 1px;padding: 8px;border-style: solid;border-color: #a9a9a9;text-align:left;}
        .tftable tr {background-color:#ffffff;}
        .tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #a9a9a9;}
    </style>
    <script type="text/javascript" src="<?php echo $this->getPath(); ?>views/style/view.js"></script>
</head>
    <body id="main_body">
        <img id="top" src="<?php echo $this->getPath(); ?>views/style/top.png" alt="">

        <?php
            if(!is_null($this->getQuery("message"))) {
                echo '<p class="msg">'.$this->getQuery("message").'</p>';
            }
        ?>







