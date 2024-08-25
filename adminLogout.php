<?php

session_abort();
echo '<script>alert("Admin Logged Out Successfully ..");</script>';
echo '<script>window.location.href = "index.php";</script>';

?>