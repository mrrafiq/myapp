<?php
Class Blog extends CI_Controller{
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('blog/login'); 
    }
}
?>