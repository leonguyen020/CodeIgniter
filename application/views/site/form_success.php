<center><h3>Your form was successfully submitted!</h3></center>
<?php 
    if($this->session->login)
    {
?>
    <center><a href="<?php echo user_url('logout');?>">Logout</a></center>
<?php
    }
?>