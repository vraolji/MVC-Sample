<?php

class Weather extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('weather/index');
    }

    function details() {
        $this->view->render('index/index');
    }

    function forecast($zipcode) {
        $modelData = $this->model->doForecast($zipcode);
        $this->view->forecastData1 = $modelData[0];
        $this->view->forecastData2 = $modelData[1];
        $this->view->forecastData3 = $modelData[2];
        $this->view->render('weather/forecast');
    }
	
}