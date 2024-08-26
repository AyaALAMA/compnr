<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'comments';


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $comment_id = $row['id'];
        $comment_text = $row['text'];
        $comment_username = $row['username'];

       
        echo "
        <div class='comment'>
            <div class='profile-picture'>
                <img src='avatar.png' alt='Profile Picture'>
            </div>
            <div class='comment-text'>
                <p>$comment_username: $comment_text</p>
                <button class='delete-comment-btn' data-comment-id='$comment_id'>Delete</button>
            </div>
        </div>
        ";
    }
} else {
    echo "No comments found.";
}

$conn->close();
?>
