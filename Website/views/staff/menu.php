<?php
    $page = new Page("Staff Menu");
    $page->showHeader();
?>

<center><span style="font-family:Cursive;font-size:28px;font-style:normal;font-weight:normal;text-decoration:none;text-transform:none;color:424242;">Select One of the following operation:</span><br />
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right h4 nav-new style2" id="navbar_anon" style="clear: right;">
            <?php
                $folder = "staff";
                menuItem("Add a Professor", 2, $page->link("add", "staff"));
                menuItem("Assign instructor for specific Section", 3, $page->link("assign", $folder));
                menuItem("Assign a TA", 4, $page->link("input_ta", $folder));
                menuItem("List Course Catalog", 5, $page->link("course_catalog", $folder));
            ?>
        </ul>
        <div class="clearfix"></div>
    </div>
</center>

<?php
    $page->showFooter();
?>



