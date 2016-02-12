<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();                

        if (isset($_POST["thezip"]) && !empty($_POST["thezip"])) {
            header("Location: weather/forecast/" . $_POST["thezip"]);
        }

    }

    function index() {
        $this->view->render('index/index');
    }

    function details() {
        $this->view->render('index/index');
    }
	
}