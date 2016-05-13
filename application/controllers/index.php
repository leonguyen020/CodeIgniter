<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class index extends MY_Controller
{
    public $data = array();
    public function __construct() {
        parent::__construct();
        
        // Load model, library, helper
        $this->load->model('user_model');
        $this->load->library('encrypt');
        $this->load->helper(array('form','url')); //'admin_helper'
        $this->load->library(array('session', 'form_validation', 'email'));
    }
    
    public function index()
    {
        // load admin_url
        $this->load->helper('admin_helper');
        
        if($this->input->post())
        {
            // Set rules
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('pass', 'Mật khẩu', 'required');
            $this->form_validation->set_rules('login', 'Đăng nhập', 'callback_check_login');
            
            if($this->check_email())
            // Nếu email đã tồn tại thì sẽ có 2 trường hợp
            // và thực hiện phương thức sau
            {
//                if()
//                    // trường hợp đúng mail nhưng sai password
//                {
//                    $where = array(
//                      'password' => sha1($this->input->post('pass'))
//                    );
//                }
//                else
//                    // trường hợp đúng cả 2
//                {
//                    
//                }
            }
            else
            // Nếu email không tồn tại thì thực hiện phương thức sau
            {
                
            }
        }
        
        $this->data['main_view'] = 'site/pages/google_login';
        $this->data['title'] = 'Sign in to our website !';
        $this->load->view('site/layout/layout', $this->data);
    }
    
    // Phương thức đăng nhập
    public function login()
    {
        if($this->session->userdata('login') == NULL) 
        // Nếu session login không tồn tạo thì sẽ chạy phương thức sau
        {
            if($this->input->post())
            // Nếu bấm gửi thành công thì sẽ thực hiện phương thức sau
            {
                // Set rules 
                $this->form_validation->set_rules('login_email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('login_pass', 'Mật khẩu', 'required');
                $this->form_validation->set_rules('login', 'Đăng nhập', 'callback_check_login');
                
                // Run form login
                if($this->form_validation->run()) 
                // Nếu form chạy thành công thì thực hiện phương thức sau
                {
                    // điều kiện where
                    $where = array(
                        'email' => $this->input->post('login_email'), 
                        'password' => sha1($this->input->post('login_pass'))
                    );
                    // Lấy thông tin thành viên
                    $user = $this->user_model->get_info_rule($where);
                    // Lưu vào mảng session
                    $this->session->set_userdata('login', $user);
                    // Tạo thông báo
                    $this->session->set_flashdata('flash_message', 'Đăng nhập thành công');
                    // Kiểm tra admin
                    $this->check_admin();
                    // Trả về form thành công
//                    redirect(form_url('success'));
                }
                else
                // Nếu form ko thành công thì sẽ chuyển về trang thất bại
                {
                    redirect(form_url('error'));
                }
            }
            // Load view và tiêu đề
            $data = array('main_view'=>"site/pages/login",'title'=>"Login to our website !");
            $this->load->view('site/layout/layout',$data);
        }
        else
        // Nếu đã tồn tại session login thì sẽ chuyển đến trang thành công
        {
            $data = array(
                'message' => 'Bạn đã đăng nhập !',
                'main_view' => "site/pages/blank_page",
                'title' => "Error !"
            );
            $this->load->view('site/layout/layout',$data);
            
//            redirect(form_url('error'));
        }
    }
    
    // Phương thức đăng xuất
    public function logout()
    {
        if($this->_user_is_login())
        {
           //neu thanh vien da dang nhap thi xoa session login
           $this->session->unset_userdata('login');
        }
        $this->session->set_flashdata('flash_message', 'Đăng xuất thành công');
        redirect(user_url('login'));
    }
    
    // Phương thức đăng ký thành viên
    public function register()
    {
        // Nếu tồn tại session login
        if($this->session->userdata('login') != NULL)
        {
            $data = array(
                'message' => 'Bạn đã đăng nhập !',
                'main_view' => "site/pages/blank_page",
                'title' => "Error !"
            );
            $this->load->view('site/layout/layout',$data);
        }else // Không tồn tại session login
        {
            if($this->input->post())
            {
                // Set rules
                $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('phone', 'Mobile Phone', 'numeric|required|min_length[9]|max_length[13]');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
                $this->form_validation->set_rules('password_confirmation', 'Confirm Password', 'matches[password]|required');

                // Chạy phương thức kiểm tra dữ liệu
                if($this->form_validation->run())
                {
                    // Add data to user table
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'phone' => $this->input->post('phone'),
                        'email' => $this->input->post('email'),
                        'password' => sha1($this->input->post('password')),
                        'created' => $this->input->post('created')
                    );

                    if($this->user_model->create($data)){
                        // Nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm dữ liệu thành công');
                    }
                    else{
                        $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại');
                    }
                    // Redirect to login page
                    redirect(user_url('login'));
                }
            }
            $this->data['main_view'] = 'site/pages/register';
            $this->data['title'] = 'Join our website for free !';
            $this->load->view('site/layout/layout', $this->data);
        }
    }
    
    // Trang contact  
    public function contact()
    {
        // set validation rules
        $this->form_validation->set_rules('contact_name','Name','trim|required|callback_alpha_space_only');
        $this->form_validation->set_rules('contact_email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('contact_subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('contact_message', 'Message', 'trim|required');
        
        // first get the data from the form
        $name = $this->input->post('contact_name');
        $from_email = $this->input->post('contact_email');
        $subject = $this->input->post('contact_subject');
        $message = $this->input->post('contact_message');

        //set to_email id to which you want to receive mails
        $to_email = 'admin@superb-review.com';
        
        // load view
        $this->data['main_view'] = 'site/pages/contact';
        $this->data['title'] = 'Feel free to contact us to get full support !';
        $this->load->view('site/layout/layout', $this->data);
    }
}
?>