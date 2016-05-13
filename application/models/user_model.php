<?php
class user_model extends MY_Model
{
    //ten bang du lieu
    public $table = 'user';
    
    // Check trong bảng dữ liệu
    public function check_login()
    {
        $where = array(
            'email' => $email,
            'password' => $password
        );
        $this->db->where($where);
        
        // truy vấn dữ liệu
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }
    /*
     * lay thong tin thanh vien
     */
    public function get_user_info($where = array())
    {
        //tao dieu kien cho cau truy van
        $this->db->where($where);
        $result = $this->db->get('user');
        return $result->row();
    }
}
?>
