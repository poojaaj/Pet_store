<?php
/**
 * Created by PhpStorm.
 * User: eNeMetcH
 * Date: 11/29/18
 * Time: 22:59
 */

class Pets extends CI_Controller{

    function index(){
        $this->load->view('templates/header');
        $this->load->view('index');
        $this->load->view('templates/footer');
    }

    function about_us(){
        $this->load->view('templates/header');
        $this->load->view('aboutus');
        $this->load->view('templates/footer');
    }

    function contact_us(){
        if(!$this->input->post()){
            $this->load->view('templates/header');
            $this->load->view('contactus');
            $this->load->view('templates/footer');
        }
        else{
            $this->load->library('form_validation');

            $this->form_validation->set_rules('l_name', 'Last Name', 'required|alpha');
            $this->form_validation->set_rules('f_name', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('comments', 'Message', 'required|alpha_numeric_spaces');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('contactus');
                $this->load->view('templates/footer');
            }
            else {
                $this->load->model('pets_model');
                $this->pets_model->insert_comment($_POST);

                $this->load->view('templates/header');
                $this->load->view('contactus', array('data' => TRUE));
                $this->load->view('templates/footer');
            }
        }

    }

    function client(){
        if(!$this->input->post()){
            $this->load->view('templates/header');
            $this->load->view('client');
            $this->load->view('templates/footer');
        }
        else{
            $this->load->library('form_validation');

            $this->form_validation->set_rules('l_name', 'Last Name', 'required|alpha');
            $this->form_validation->set_rules('f_name', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('phone', 'Phone', 'numeric');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('client');
                $this->load->view('templates/footer');
            }
            else {
                $this->load->model('pets_model');

                $role_id = 2;

                if($this->pets_model->check_if_email_exists($_POST['email'])){
                    $success = 1;
                }
                else{
                    $user_id = $this->pets_model->insert_user($_POST['email'], $role_id);
                    $this->pets_model->insert_client($_POST, $user_id);

                    //SEND EMAIL TO USER WITH NEW PASSWORD
                    $msg = "The temp password is: 123456" ;
                    // send email
                    if ($var = mail($_POST['email'], "Your Password", $msg)) {
                        $success = 2;
                    }
                    else {
                        $success = 3;
                    }

                }

                $this->load->view('templates/header');
                $this->load->view('client', array('data' => $success));
                $this->load->view('templates/footer');
            }
        }
    }

    function service(){
        if(!$this->input->post()){
            $this->load->view('templates/header');
            $this->load->view('service');
            $this->load->view('templates/footer');
        }
        else{
            $this->load->library('form_validation');

            $this->form_validation->set_rules('l_name', 'Last Name', 'required|alpha');
            $this->form_validation->set_rules('f_name', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('phone', 'Phone', 'numeric');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('service');
                $this->load->view('templates/footer');
            }
            else {
                $this->load->model('pets_model');

                $role_id = 1;

                if($this->pets_model->check_if_email_exists($_POST['email'])){
                    $success = 1;
                }
                else{
                    $user_id = $this->pets_model->insert_user($_POST['email'], $role_id);
                    $this->pets_model->insert_service($_POST, $user_id);

                    //SEND EMAIL TO USER WITH NEW PASSWORD
                    $msg = "The temp password is: 123456" ;
                    // send email
                    if ($var = mail($_POST['email'], "Your Password", $msg)) {
                        $success = 2;
                    }
                    else {
                        $success = 3;
                    }

                }

                $this->load->view('templates/header');
                $this->load->view('service', array('data' => $success));
                $this->load->view('templates/footer');
            }
        }
    }

    function client_petstore(){
        $this->load->view('templates/header');
        $this->load->view('client_petstore');
        $this->load->view('templates/footer');
    }

    function business_petstore(){
        $this->load->view('templates/header');
        $this->load->view('business_petstore');
        $this->load->view('templates/footer');
    }

    function login(){
        if(!$this->input->post()){
            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        }
        else{
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('login');
                $this->load->view('templates/footer');
            }
            else {
                $this->load->model('pets_model');

                $role_id = $this->pets_model->verify_login($_POST['email'], $_POST['password']);

                switch($role_id){
                    case 1:
                        redirect(base_url('index.php/pets/business_petstore'));
                        break;

                    case 2:
                        redirect(base_url('index.php/pets/client_petstore'));
                        break;

                    default:
                        $this->load->view('templates/header');
                        $this->load->view('login', array('data' => FALSE));
                        $this->load->view('templates/footer');
                }
            }
        }
    }

    function logout(){
        unset($_SESSION['user_data']);
        redirect(base_url('index.php/pets/login'));
    }

}