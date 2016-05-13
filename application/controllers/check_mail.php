<?php

/*
    Hàm check email
*/
// #1
function check_email()
{
    $mail = $this->input->post('email');
    $where = array('email' => $mail);

    if($this->user_model->check_exists($where))
    {
        $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
        return false;
    }
    return true;
}

// #2
$email = $this->input->post('login_email');
function check_email_2($email)
{
    $post_mail = $this->input->post($email);
    $where = array('email' => $post_mail);
    if($this->user_model->check_exists($where))
    {
        $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
        return false;
    }
    return true;
}
