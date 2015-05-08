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
                        $s .= '<option value="'.$values[$i].'""';
                        if($names[$i] == $selectedName) $s .= 'selected';
                        $s .= '>'.$names[$i].'</option>';
                    }
        	$s .= '</select>
		    </div>
		</li>';

        return $s;
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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $this->getTitle(); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->getPath(); ?>views/style/view.css" media="all">
    <script type="text/javascript" src="<?php echo $this->getPath(); ?>views/style/view.js"></script>
</head>
    <body id="main_body">
        <img id="top" src="<?php echo $this->getPath(); ?>views/style/top.png" alt="">

        <?php
            if(!is_null($this->getQuery("message"))) {
                echo '<p class="msg">'.$this->getQuery("message").'</p>';
            }
        ?>





