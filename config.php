
<!-- connect to database -->

<?php
    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    if ($conn->connect_error) die("DB Connection failed");
?>