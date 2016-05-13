<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class admin extends MY_Controller
{
    public $data = array();
    public function __construct() {
        parent::__construct();
//        $this->load->helper('admin_helper');
    }
    public function index()
    {
        $this->data['admin_view'] = 'admin/pages/index';
        $this->data['title'] = 'Dashboard';
        $this->load->view('admin/layout/layout', $this->data);
    }
    // Trang hiện dữ liệu user trong database
    public function users()
    {
        $this->data['admin_view'] = 'admin/pages/users';
        $this->data['title'] = 'User Management';
        $this->load->view('admin/layout/layout', $this->data);
    }
    // Trang hiện dữ liệu của admin
    public function profile()
    {
        $this->data['admin_view'] = 'admin/pages/admin_profile';
        $this->data['title'] = 'Administrator Profile';
        $this->load->view('admin/layout/layout', $this->data);
    }
}

?>