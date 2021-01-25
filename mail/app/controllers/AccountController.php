<?php

namespace app\controllers;
use app\core\Controller;
use app\core\View;


class AccountController extends Controller
{
    public array $letters = [];
    public array $themes = [];
    public array $mailers = [];
    public array $sentLetters = [];
    public array $sentThemes = [];
    public array $recipients = [];

    public function loginAction()
    {

        if (!empty($_POST)) {
            if ($this->model->checkEmailExists($_POST['loginEmail']) && $this->model->checkPassword($_POST) ) {
//                $this->view->message('!', 'Login completed successfully');
//                if ($this->checkAcl()){
                $_SESSION['userEmail'] = $_POST['loginEmail'];
                $this->view->location('account/inbox');
            }
        }
        $this->view->render('Login');
    }

    public function registerAction()
    {

        if (!empty($_POST)) {


            if (!$this->model->validate(['firstName', 'lastName', 'email', 'password'], $_POST)) {
                $this->view->message('!', $this->model->error);
            } elseif (!$this->model->matchingPasswords($_POST)) {
                $this->view->message('!', 'Password mismatch');
            } elseif ($this->model->checkEmailExists($_POST['email'])) {
                $this->view->message('!', 'This email address already registered');
            }

            $_SESSION['userEmail'] = $_POST['email'];
            $this->model->registerDb($_POST);
            $this->view->location('account/inbox');
        }
        $this->view->render('Registration');
    }

    public function inboxAction(): void
    {



        $this->letters = $this->model->getLetters($_SESSION['userEmail']);
        $this->mailers = $this->model->getMailer($_SESSION['userEmail']);
        $this->themes = $this->model->getTheme($_SESSION['userEmail']);


        $this->recipients = $this->model->getRecipient($_SESSION['userEmail']);
        $this->sentLetters = $this->model->getSentLetters($_SESSION['userEmail']);
        $this->sentThemes = $this->model->getSentThemes($_SESSION['userEmail']);

        $this->view->render('Inbox', $this->letters,
            $this->mailers, $this->themes, $this->sentLetters, $this->sentThemes , $this->recipients);

    }

    public function sentAction(): void
    {

        $this->letters = $this->model->getLetters($_SESSION['userEmail']);
        $this->mailers = $this->model->getMailer($_SESSION['userEmail']);
        $this->themes = $this->model->getTheme($_SESSION['userEmail']);

        $this->recipients = $this->model->getRecipient($_SESSION['userEmail']);
        $this->sentLetters = $this->model->getSentLetters($_SESSION['userEmail']);
        $this->sentThemes = $this->model->getSentThemes($_SESSION['userEmail']);

        $this->view->render('Sent', $this->letters,
            $this->mailers, $this->themes, $this->sentLetters, $this->sentThemes , $this->recipients);
    }
    public function messageAction(): void
    {
        if (!empty($_POST['theme'] && $_POST['message'] && $_POST['recipient'])){
            $this->model->sendMessage($_POST);
        }
//            $this->view->message('','Message sent successfully!');
    }

    public function deleteAction(): void
    {
        $this->model->del($_SESSION['message']);
        $this->view->redirect('account/inbox');
    }

    public function logoutAction():void {
        unset($_SESSION['userEmail']);
        session_destroy();
        session_unset();
        $this->view->redirect('account/login');
    }
}
