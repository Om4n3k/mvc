<?php

class User_Controller extends Controller {
    function __construct()
    {
        parent::__construct();
        $this->loadModel('User_Model');
    }

    public function login() {
        if($this->userLoggedIn) header('Location:'.$this->base_path);
        array_push($this->view->js,$this->base_path.'Views/user/js/user.js');
        $this->view->render('user/login',true);
        Session::set('previous_url',$_SERVER['HTTP_REFERER']);
    }

    public function fLogin() {
        $formValidator = new Form();
        $formValidator  ->post('login')
                        ->val('minlength',3)
                        ->post('password')
                        ->val('minlength', 6);
        $formResult = $formValidator->submit();
        if(is_array($formResult)) {
            $response = [
                'return'=>false,
                'response'=>$formResult
            ];
            echo json_encode($response);
        } else {
            $data = [
                'login' => $_POST['login'],
                'password' => Utils::Hasher($_POST['password']),
            ];
            if($this->model->loginUser($data)) {
                $response = [
                    'return'=>true,
                    'response'=>'Zalogowano poprawnie<br>Poczekaj na przekierowanie',
                    'url'=> Session::get('previous_url')
                ];
                echo json_encode($response);
            } else {
                $response = [
                    'return'=>false,
                    'response'=>'Podana kombinacja loginu i hasła nie została odnaleziona'
                ];
                echo json_encode($response);
            }
        }
    }

    public function register() {
        if($this->userLoggedIn) header('Location:'.$this->base_path);
        array_push($this->view->js,$this->base_path.'Views/user/js/user.js');
        $this->view->render('user/register',true);
    }

    public function fRegister() {
        $formValidator = new Form();
        $formValidator  ->post('name')
                        ->val('minlength',3)
                        ->val('maxlength',64)
                        ->post('login')
                        ->val('minlength',3)
                        ->val('maxlength',32)
                        ->post('password')
                        ->val('minlength', 6)
                        ->post('cpassword')
                        ->val('compare',$_POST['password'])
                        ->post('discord')
                        ->val('matches','/[a-zA-z]+#[0-9]{4}/');
        $formResult = $formValidator->submit();
        if(is_array($formResult)) {
            $response = [
                'return'=>false,
                'response'=>$formResult
            ];
            echo json_encode($response);
        } else {
            $data = [
                'name' => $_POST['name'],
                'login' => $_POST['login'],
                'password' => Utils::Hasher($_POST['password']),
                'discord' => $_POST['discord'],
            ];
            if($this->model->registerUser($data)) {
                $response = [
                    'return'=>true,
                    'response'=>'Zarejestrowano poprawnie<br>Poczekaj na przekierowanie do strony logowania'
                ];
                echo json_encode($response);
            } else {
                $response = [
                    'return'=>false,
                    'response'=>'Wystąpił błąd podczas twojej rejestracji'
                ];
                echo json_encode($response);
            }
        }
    }

    public function logout() {
        Session::destroy();
        header("Location:{$_SERVER['HTTP_REFERER']}");
    }
}