<?php
    $page = new Page("404 - Page Not Found");
    $page->showHeader();
?>
    <p>The page you are looking for does not exist.</p>

    <p><a href="?">Home</a></p>

<?php
    $page->showFooter();
?>