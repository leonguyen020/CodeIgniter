<script type="text/javascript">
    setTimeout(onUserInactivity, 1000 * 5)
    function onUserInactivity() {
       window.location.href = "index"
    }
</script>

<center>
    <h3><?php echo $message?></h3>
    <p>Trở về <a href="<?php echo user_url();?>">trang chủ</a></p>
</center>