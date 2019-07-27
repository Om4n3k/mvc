<?php
// URL [0] => Controller
// URL [1] => Method
// URL [>2] => Params
class Bootstrap
{
    private $_url = null;
    private $_controller = null;
    private $_config = null;

    public function init() {
        $this->_getUrl();
        $this->_config = Config::getConfig();

        
        // Check if a controller has been called
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
        }

        $this->_loadExistingController();
        $this->_callControllerMethod();
    }

    private function _getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : 'index';
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        //xampp Workaround
        $this->_url = explode('/', $url);
        if ($this->_url[0] == 'index.php') $this->_url[0] = 'index';
    }

    private function _error()
    {
        require($this->_config['paths']['controllers'] .'Error_Controller.php');
        $this->_controller = new Error_Controller();
        $this->_controller->index();
        exit;
    }

    private function _loadDefaultController()
    {
        require($this->_config['paths']['controllers'] .'Index_Controller.php');
        $this->_controller = new Index_Controller();
        $this->_controller->index();
        die;
    }

    private function _loadExistingController()
    {
        $file = $this->_config['paths']['controllers'] . $this->_url[0] . '_Controller.php';

        // Check if controller exists
        if (file_exists($file)) {
            require($file);
        } else {
            $this->_error();
            return false;
        }
        $this->_url[0] = $this->_url[0] . '_Controller';
        $this->_controller = new $this->_url[0];
    }

    private function _callControllerMethod() {
        // Check if method has been called
        if (isset($this->_url[1])) {
            // Check if method exists
            if (method_exists($this->_controller, $this->_url[1])) {
                // Check if any parameter has been called
                if (isset($this->_url[2])) {
                    $this->_controller->{$this->_url[1]}($this->_url[2]);
                } else {
                    $this->_controller->{$this->_url[1]}();
                }
            } else {
                $this->_controller->index();
            }
        } else {
            $this->_controller->index();
        }
    }
}
