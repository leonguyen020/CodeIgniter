<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class form extends MY_Controller
{
    public function __construct() {
        parent::__construct();
    }
    function success()
    {
        $this->data['main_view'] = 'site/form_success';
        $this->data['title'] = 'Submited Successfully';
        $this->load->view('site/layout/layout',$this->data);
    }
    function error()
    {
        $this->data['main_view'] = 'site/form_error';
        $this->data['title'] = 'Error Occur ! Try again later !';
        $this->load->view('site/layout/layout',$this->data);
    }
}
?>