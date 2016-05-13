<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	// Gửi dữ liệu qua view;
	public $data = array();
	
	function __construct() 
	{
            parent::__construct();
            $this->load->helper(array('form','url','common_helper'));
            $controller = $this->uri->segment(1);
            
            if($controller == 'admin')
            {
                $this->is_admin();
            }
            
	}
        
        // Kiểm tra admin
        protected function is_admin()
        {
            // Kiểm tra session có tồn hay ko
            if($this->session->userdata('login') != NULL)
            // Nếu session login có tồn tại 
            // thì thực hiện phương thức sau
            {
                // Kiểm tra quyền quản trị viên
                if($this->session->userdata('login')->permission != '1') 
                // Nếu không phải là admin
                {
                    redirect(form_url('success')); // tới đây code còn hoạt động khi không phải là admin
                }
            }
            else
            // Nếu session login không tồn tại
            // thì thực hiện phương thức sau
            {
                redirect(user_url('login'));
            }
        }
        
        // Kiểm tra đã đăng nhập hay chưa
        protected function _user_is_login()
        {
            $user_data = $this->session->userdata('login');
            //neu chua login
            if(!$user_data)
            {
                return false;
            }
            return true;
        }
        
        // Phương thức kiểm tra admin
        protected function check_admin()
        {
            if($this->session->userdata('login') != NULL)
            // Nếu tồn tại session login thì thực hiện phương thức sau
            {
                // Kiểm tra quyền quản trị viên
                if($this->session->userdata('login')->permission != '1') 
                // Nếu không phải là admin
                {
                    redirect(form_url('success'));
                }
                redirect(admin_url());
            }
            else
            // Nếu không tồn tại session
            {
                redirect(user_url('login'));
            }
        }
        
        //Hàm check email
        function check_email()
        {
            // Gọi $action = segment thứ 2
            $action = $this->uri->segment(2);
            if($action == 'check_email')
            // Nếu $action = function thì sẽ redirect qua trang login
            {
                redirect(user_url('login'));
            }

            $mail = $this->input->post('email');
            $where = array('email' => $mail);

            if($this->user_model->check_exists($where))
            {
                $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
                return false;
            }
            return true;
        }
        
        //Kiem tra dang nhap
        function check_login()
        {
            // Gọi $action = segment thứ 2 sau index
            $action = $this->uri->segment(2);
            if($action == 'check_login')
            // Nếu $action = function thì sẽ redirect qua trang login
            {
                redirect(user_url('login'));
            }

            //lay du lieu tu form và gán vào mảng
            $where = array(
                'email' => $this->input->post('login_email'), 
                'password' => sha1($this->input->post('login_pass'))
            );
            if(!$this->user_model->check_exists($where))
            {
                 //trả về thông báo lỗi nếu đã tồn tại email này
                $this->form_validation->set_message(__FUNCTION__, 'Đăng nhập không thành công');
                return FALSE;
            }
            return true;
        }
        
}
