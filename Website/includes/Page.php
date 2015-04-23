<?php


	class Page {

        private $title;
        private $path;
        private $query;

        private $show_crumbs;
        private $crumbs;
        private $crumb_size;
        private $messageArray;
        private $messageArraySize;

        private $header = "views/style/head.php";
        private $footer = "views/style/foot.php";


        private $session;
        private $sessionKey = "__prev_page";


        public function __construct($title = "", $show_crumbs = false, $path = ""){
            $this->setQuery($_SERVER['QUERY_STRING']);
            $this->setTitle($title);
            $this->setPath($path);
            $this->setCrumbs($show_crumbs);
            //$this->setSession(new Session());

            //$this->capturePage();
            $this->messageArray = array();
            $this->messageArraySize = 0;
            if($this->show_crumbs){ //No need to allocate memory if we are not going to show the curmbs, right?, RIGHT?
                $this->crumbs = array();
                $this->random();
                $this->crumb_size = 0; //keep up with the size of the array, so we don't have to call count() all the time.
            }

        }
        public function getURL(){
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $domainName = $_SERVER['HTTP_HOST'];
            return $protocol.$domainName.dirname($_SERVER['PHP_SELF']);
        }
        public function setTitle($title){
            $this->title = $title;
        }
        public function getTitle(){
            return $this->title;
        }
        public function setCrumbs($show_crumbs){
            $this->show_crumbs = $show_crumbs;
        }
        public function showCrumbs(){
            return $this->show_crumbs;
        }
        public function setPath($path){
            $this->path = $path;
        }

        public function getPath() {
            return $this->path;
        }



        public function showHeader(){
            include($this->path.$this->header);
        }
        public function showFooter(){
            include ($this->path.$this->footer);
        }
        public function showBody($html){
            echo $html;
        }


        /* Query Functions */
        private function setQuery($q){ //Only should be called within the class, outside modifiers may ruin exact results.
            $this->query = $q;
        }
        public function getQueryString(){
            return $this->query;
        }
        public function getQuery($get){
            if(isset($_GET[$get]))
                return $_GET[$get];
            else
                return NULL;
        }

        public function queryEqual($get, $value, $strict = false){ //This just checks to see if a query equals a value., not really needed.
            if(!$strict)
                return $this->getQuery($get) == $value;
            else
                return $this->getQuery($get) === $value;
        }
        public function changeQuery($get, $var){
            parse_str($this->getQueryString(), $out);
            if(array_key_exists($get, $out)){
                $out[$get] = $var;
                $this->setQuery(http_build_query($out));
            }else
                $this->addQuery($get, $var);
        }
        public function removeQuery($get){
            parse_str($this->getQueryString(), $out);
            if(array_key_exists($get, $out)){
                unset($out[$get]);
                $this->setQuery(http_build_query($out));
            }
        }
        public function removeAllQuerys(){//I know, I know Querys should be Queries, but I think keeping it this way may or may not help
            $this->setQuery("");
        }
        public function addQuery($name, $query){
            parse_str($this->getQueryString(), $out);
            $out[$name] = $query;
            $this->setQuery(http_build_query($out));
        }
        public function getCurrentPage(){
            if(isset($_GET['page']))
                return $_GET['page'];
            else
                return "?";
        }

        public function getPage() {
            return "?" . $this->getQueryString();
        }

        /* End Query Functions */

        //link is a helper function makeLink or makeMultiLink
        public function link($value, $folder = "", $leave = array("")) {
            if(empty($folder))
                return $this->makeLink("page", $value, $leave);
            else
                return $this->makeMultiLink(array("page", "prefix"), array($value, $folder), $leave);
        }

        /* function: makeLink - This function takes in a page name and the value for the page, $leave is an array that will leave only those queries and their values */
        public function makeLink($name, $value, $leave = array("")){
            parse_str($this->getQueryString(), $out);

            $newOut[$name] = $value; //Building up the new array that will returned.
            $keyArray = array_keys($out); //array to hold all the keys of the queryString
            for($i = 0; $i<count($leave); $i++){
                if(!is_null($this->getQuery($leave[$i]))){ //Lets check to see if this value is set.
                    $keep = array_search($leave[$i], $keyArray); //this sees if a value is in a array and returns the index., sees if what we want to leave is in the keyArray.
                    //$keyArray[$keep] should return something like "page" or "dark" or ?queryName=value "queryName"
                    $newOut[$keyArray[$keep]] = $out[$keyArray[$keep]];
                }
            }
            return "?".http_build_query($newOut);
        }
        public function makeMultiLink($names = array(), $values = array(), $leave = array("")){
            $newOut = array();
            for($i = 0; $i<count($names); $i++){
                $newOut[$names[$i]] = $values[$i];
            }
            parse_str($this->getQueryString(), $out);
            $keyArray = array_keys($out);
            for($i = 0; $i<count($leave); $i++){
                if(!is_null($this->getQuery($leave[$i]))){ //Lets check to see if this value is set.
                    $keep = array_search($leave[$i], $keyArray); //this sees if a value is in a array and returns the index., sees if what we want to leave is in the keyArray.
                    //$keyArray[$keep] should return something like "page" or "dark" or ?queryName=value "queryName"
                    $newOut[$keyArray[$keep]] = $out[$keyArray[$keep]];
                }
            }
            return "?".http_build_query($newOut);
        }
        public function refresh($includeQueries = true){
            $this->redirect($this->currentURL($includeQueries));
        }
        public function redirect($url = NULL){
            if(is_null($url))
                $url = "?".$this->getQueryString();
            header("Location: ".$url);
        }
        public function redirectToMenu() {
            $this->changeQuery("page", "menu");
            $this->redirect();
        }
        public function currentURL($includeQueries = true){
            $url = 'http://';
            if ($_SERVER["SERVER_PORT"] != "80")
                $url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
            else
                $url .= $_SERVER["SERVER_NAME"];
            if($includeQueries)
                $url .= $_SERVER["REQUEST_URI"];
            else
                $url .= $_SERVER["SCRIPT_NAME"];
            return $url;
        }
        /* Bread Crumb Operations */
        private function addCrumb($crumb, $i){
            $this->crumbs[$i] = $crumb;
            $this->crumb_size++;
        }

        private function removeCrumb($i){
            unset($this->crumbs[$i]);
            $this->crumb_size--;
        }
        public function printCrumb($i){
            if($i < $this->crumb_count())
                echo $this->crumbs[$i];
            else
                echo "";
        }
        public function random(){
            $this->addCrumb("Page A", 0);
            $this->addCrumb("Page B", 1);
            $this->addCrumb("Page C", 2);
        }
        private function crumb_count(){
            return $this->crumb_size;
        }

        /* Session Functions */

//        public function getSession() {
//            return $this->session;
//        }
//
//        public function setSession($session) {
//            $this->session = $session;
//        }
//
//        private function capturePage() {
//            $this->session->add($this->sessionKey, $this->getPage());
//        }
//
//        public function getPrevPage() {
//            $this->session->get($this->sessionKey);
//        }

//        function __destruct() {
//            //$this->capturePage();
//        }


        /* End Session Functions */
    }
?>