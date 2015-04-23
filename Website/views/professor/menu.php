<?php
    $page = new Page("Professor Menu");
    $page->showHeader();
?>

<center><span style="font-family:Cursive;font-size:28px;font-style:normal;font-weight:normal;text-decoration:none;text-transform:none;color:424242;">Select One of the following operation:</span><br />
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right h4 nav-new style2" id="navbar_anon" style="clear: right;">
            <?php
                $folder = "professor";
                menuItem("Update preferences of the courses to teach in a given academic year", 2, $page->link("update_preferences", $folder));
                menuItem("Update teaching load distribution", 3, $page->link("load_dist", $folder));
                menuItem("Input special request for a given year", 4, $page->link("add_special_request", $folder));
                menuItem("Input the text books", 5, $page->link("add_textbook", $folder));
                menuItem("See the courses assigned to the professor next semester", 6, $page->link("assigned_courses", $folder));
            ?>
        </ul>
        <div class="clearfix"></div>
    </div>
</center>

<?php
    $page->showFooter();
?>
