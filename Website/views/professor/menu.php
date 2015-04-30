<?php
    $page = new Page("Professor Menu");
    $page->showHeader();
?>

<center><span style="font-family:Cursive;font-size:28px;font-style:normal;font-weight:normal;text-decoration:none;text-transform:none;color:424242;">Select One of the following operation:</span><br />
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right h4 nav-new style2" id="navbar_anon" style="clear: right;">
            <?php
                $folder = "professor";
                menuItem("Update preferences and load distribution", 2, $page->link("update_preferences", $folder));
                menuItem("Input special request for a given year", 3, $page->link("add_special_request", $folder));
                menuItem("Input the text books", 4, $page->link("add_textbook", $folder));
                menuItem("See the courses assigned to the professor next semester", 5, $page->link("assigned_courses", $folder));
            ?>
        </ul>
        <div class="clearfix"></div>
    </div>
</center>

<?php
    $page->showFooter();
?>
