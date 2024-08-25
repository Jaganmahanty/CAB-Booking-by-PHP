<?php

session_abort();
echo '<script>alert("Customer Logged Out Successfully ..");</script>';
echo '<script>window.location.href = "index.php";</script>';

?>