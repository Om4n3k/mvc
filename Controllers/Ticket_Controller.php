<?php

class Ticket_Controller extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('Ticket_Model');
    }

    public function index()
    {
        $this->view->title = 'Tickety';
        $tickets = $this->model->getAllTickets();
        for ($i = 0; $i < sizeof($tickets); $i++) {
            $tickets[$i]['solvetion'] = $this->_getSolvetionString($tickets[$i]['solvetion']);
            $tickets[$i]['added_by_login'] = $this->User->getUsernameById($tickets[$i]['added_by']);
        }
        $this->view->tickets = $tickets;
        $this->view->render('ticket/index');
    }

    public function unsolved()
    {
        $this->view->title = 'Nierozwiązane tickety';
        $tickets = $this->model->getAllTickets('where `solvetion`=1');
        for ($i = 0; $i < sizeof($tickets); $i++) {
            $tickets[$i]['solvetion'] = $this->_getSolvetionString($tickets[$i]['solvetion']);
            $tickets[$i]['added_by_login'] = $this->User->getUsernameById($tickets[$i]['added_by']);
        }
        $this->view->tickets = $tickets;
        $this->view->render('ticket/index');
    }

    public function show($id)
    {
        $result = $this->model->getTicket($id);
        if ($result != false) {
            array_push($this->view->js, $this->base_path . 'Views/ticket/js/show.js');
            $this->view->ticketid = $result['ticketid'];
            $this->view->title = $result['title'];
            $this->view->description = $result['text'];
            $this->view->post_date = date('d.m.Y H:i', $result['post_date']);
            $this->view->solvetion = $this->_getSolvetionString($result['solvetion']);
            $this->view->added_by = $this->User->getUserNameById($result['added_by']);
            $this->view->added_by_nick = (empty($result['added_by_discord'])) ? $this->User->getUserDiscordById($result['added_by']) : $result['added_by_discord'];
            $this->view->comments = [];
            $comments = $this->model->getAllComments($result['ticketid']);
            if ($comments) {
                for ($i = 0; $i < sizeof($comments); $i++) {
                    $comments[$i]['post_date'] = date('d.m.Y H:i', $comments[$i]['post_date']);
                    $comments[$i]['username'] = $this->User->getUsernameById($comments[$i]['userid']);
                    $comments[$i]['role'] = $this->User->getRole($comments[$i]['userid']);
                    $comments[$i]['text'] = str_replace(array("\r\n", "\r", "\n"), "<br />", $comments[$i]['text']);
                }
                $this->view->comments = $comments;
            }
            //print_r($this->view->comments); die;
        } else header('Location:' . $this->base_path . 'ticket/index');
        $this->view->render('ticket/show');
    }

    public function fComment()
    {
        $formValidator = new Form();
        $formValidator->post('comment')
            ->val('minlength', 5);
        $formResult = $formValidator->submit();
        if (is_array($formResult)) {
            $response = [
                'return' => false,
                'response' => $formResult
            ];
            echo json_encode($response);
        } else {
            $data = [
                'text' => $_POST['comment'],
                'userid' => $_POST['userid'],
                'ticketid' => $_POST['ticketid'],
                'post_date' => time()
            ];
            if ($this->model->createComment($data)) {
                $response = [
                    'return' => true
                ];
                echo json_encode($response);
            } else {
                $response = [
                    'return' => false,
                    'response' => 'Dodawanie komentarza nie powiodło się'
                ];
                echo json_encode($response);
            }
        }
    }

    public function create()
    {
        array_push($this->view->js, $this->base_path . 'Views/ticket/js/create.js');
        $this->view->render('ticket/create');
    }

    // Discord pregmatch [a-zA-z]+#[0-9]{4}
    public function fCreate()
    {
        if (!$this->userLoggedIn) {
            if (!empty($_POST['discord'])) {
                if (preg_match('/[a-zA-z]+#[0-9]{4}/', $_POST['discord'])) {
                    $this->_startTicketCreation();
                }
            }
        } else {
            $this->_startTicketCreation();
        }
    }

    public function fChangeStatus()
    {
        if ($this->userLoggedIn) {
            $formValidator = new Form();
            $formValidator->post('')
        }
    }

    private function _startTicketCreation()
    {
        $formValidator = new Form();
        $formValidator->post('title')
            ->val('m inlength',10)
            ->val('m axlength',64)
            ->post('description')
            ->val('minlength', 50)
            ->val('maxlength', 2048);
        $formResult = $formValidator->submit();
         if(is_array($formResult)) {
            $response = [
                  'return'=>false,
                 'r esponse'=>$formResult
            ];
            echo json_encode($response);
        } else {
            $data = [
                'discord' => (!empty($_POST['discord'])) ? $_POST[ 'discord']: null,
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'type' => $_POST['type'],
                'files' => $_FILES['attatchments'],
                'userid' => $this->User->id
            ];
             if($this->model->createTicket($data)) {
                $response = [
                      'return'=>true,
                     'r esponse'=>'Ticket został dodany poprawnie'
                ];
                echo json_encode($response);
            } else {
                $response = [
                      'return'=>false,
                     'r esponse'=>'Wystąpił błąd przy dodawaniu ticketu'
                ];
                echo json_encode($response);
            }
        }
    }

    private function _getSolvetionString($id)
    {
         switch($id) {
            case 1:
                $class = 'primary';
                $text = 'Nowy';
                break;
            case 2:
                $class = 'success';
                $text = 'Zakończony';
                break;
            case 3:
                $class = 'info';
                $text = 'W Trakcie';
                break;
            case 4:
                $class = 'danger';
                $text = 'Odrzucony';
                break;
            defau l t:
                $class='danger';
                $text = 'Error';
                break;
        }
        retur n  ['class '=>$cl as s,'text'=>$text];
    }
}
