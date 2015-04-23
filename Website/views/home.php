<?php

$page = new Page("Home");

$page->showHeader();

?>
<center>
    <span style="font-family:Cursive;font-size:32px;font-style:normal;font-weight:normal;text-decoration:none;text-transform:none;color:424242;">Select a Position<br></span>
    <div class="nav_bar">

        <ul class="nav navbar-nav navbar-right h4 nav-new style2" id="navbar_select_position">
            <span style="font-family:Cursive;font-size:28px;font-style:normal;font-weight:normal;text-decoration:none;text-transform:none;color:424242;">  I am a: <br /></span>
            <?php
                menuItem("Staff / Faculty", 2, $page->link("menu", "staff"));
                menuItem("Professor / Instructor", 3, $page->link("menu", "professor"));
                menuItem("Business Manager", 4, $page->link("menu", "business_manager"));
            ?>
            </ul>
        <div class="clearfix"></div>

    </div>

</center>
<?php

$page->showFooter();

?>
