<?php
include 'config.php';

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    mysqli_query($con, "insert into publish(publish) values ('$message')");
    $sql = mysqli_query($con, "SELECT publish,id FROM publish order by id desc");
    $result = mysqli_fetch_array($sql);
    echo '<div class="message-wrap">' . str_replace("\n", "<br />", $result['publish']) . '</div><hr>';
} else {
    echo "Message is empty";
}
