<?php

class View {
    public $js = [];

    function __construct()
    {
        $this->config = Config::getConfig();
        $this->base_path = $this->config['paths']['base_path'];
        $this->_getUrl();
        //JS Array
        array_push($this->js,$this->base_path.'public/plugins/jquery/jquery.min.js');
        array_push($this->js,$this->base_path.'public/plugins/bootstrap/js/bootstrap.bundle.min.js');
        array_push($this->js,$this->base_path.'public/plugins/toaster/toastr.min.js');
        array_push($this->js,$this->base_path.'public/plugins/slimscrollbar/jquery.slimscroll.min.js');
        array_push($this->js,$this->base_path.'public/plugins/charts/Chart.min.js');
        array_push($this->js,$this->base_path.'public/plugins/ladda/spin.min.js');
        array_push($this->js,$this->base_path.'public/plugins/ladda/ladda.min.js');
        array_push($this->js,$this->base_path.'public/plugins/jquery-mask-input/jquery.mask.min.js');
        array_push($this->js,$this->base_path.'public/plugins/select2/js/select2.min.js');
        array_push($this->js,$this->base_path.'public/plugins/daterangepicker/moment.min.js');
        array_push($this->js,$this->base_path.'public/plugins/daterangepicker/daterangepicker.js');
        array_push($this->js,$this->base_path.'public/js/sleek.js');
        array_push($this->js,$this->base_path.'public/js/date-range.js');
        array_push($this->js,$this->base_path.'public/js/map.js');
        array_push($this->js,$this->base_path.'public/js/custom.js');
        array_push($this->js,'https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js');
    }

    public function render($name,$onlyBlock=false){
        if(!$onlyBlock) {
            require('views/header.php');
            require('views/sidebar.php');
            require('views/usernav.php');
        }
        require('views/'.$name.'.php');
        if(!$onlyBlock) require('views/footer.php');
    }

    private function _getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : 'index';
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        //xampp Workaround
        $this->url = explode('/', $url);
        if ($this->url[0] == 'index.php') $this->url[0] = 'index';
    }
}