<?php
try {
    if (isset($_GET['user_id'])) {
        $uid = $_GET['user_id'];
        $sql = "SELECT * FROM exercises WHERE user_id = $uid";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            throw new Exception("Student doesn't have exercises in database.");
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $desc = $row['description'];
                $due = $row['due_date'];
                $status = $row['status'];
                $subject = $row['subject'];
                $title = $row['title'];
                echo "
    <ul>
        <li>Title: $title</li>
        <li>Subject: $subject</li>
        <li>Description: $desc</li>
        <li>Status: $status</li>
        <li>Due date: $due</li>    
    </ul>
    ";
            };
        };
    } else {
        throw new Exception("Student does not exist in database.");
    };
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    echo "</br><p>Finished checking exercises.</p>";
}
