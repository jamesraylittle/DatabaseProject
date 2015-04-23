
        <div align="center">
            <?php
                if($this->getCurrentPage() != "?" || $this->getCurrentPage() == "home") {//dont display if we are at home.
            ?>
                    <br /><br />
                    <a href="javascript:history.go(-1)"><- Go Back</a> |
                    <a href="?">Home</a>
                    <br /><br />
            <?php
                }
            ?>
        </div>

        <div id="footer" align="center">

        </div>


        <img id="bottom" src="<?php echo $this->getPath(); ?>views/style/bottom.png" alt="">

    </body>
</html>