<?php
    $page = new Page("Business Manager Menu");
    $page->showHeader();
?>

<center><span style="font-family:Cursive;font-size:28px;font-style:normal;font-weight:normal;text-decoration:none;text-transform:none;color: 424242;">Select One of the following operation:</span><br />
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right h4 nav-new style2" id="navbar_anon" style="clear: right;">
            <?php
                $folder = "business_manager";
                menuItem("List all the courses the instructor has taught in the last 5 years", 2, $page->link("taught_in_years", $folder));
                menuItem("List summary information for each professor", 3, $page->link("summary", $folder));
                menuItem("List title, instructor, offered date and enrollment of the a section", 4, $page->link("section_info", $folder));
                menuItem("List all the offerings of the given course", 5, $page->link("course_info", $folder));
                menuItem("See preferences of all professors of any given year", 6, $page->link("preferences", $folder));
                menuItem("See Textbooks used by the professor", 7, $page->link("textbooks", $folder));
                menuItem("List all summer courses", 8, $page->link("summer_info", $folder));
                menuItem("Show other statistics", 9, $page->link("statistics", $folder));
            ?>
        </ul>
        <div class="clearfix"></div>
    </div>
</center>

<?php
    $page->showFooter();
?>