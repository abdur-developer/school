<?php
include_once "../../includes/dbcon.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../?e=publicholidays&error=Invalid+request');
    exit();
}
// Get form data
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$date = trim($_POST['date']);
$day = trim($_POST['day']);

if (empty($name) || empty($date)) {
    header("Location: ../?e=publicholidays&error=all+fields+are+required.&id=".encryptSt($id));
    exit();
}

try {
    // Update or Insert
    if (!empty($id)) {
        $sql = "UPDATE publicholidays SET name = ?, date = ?, day = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $date, $day, $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../?e=publicholidays&success=publicholidays+updated+successfully!&id=".encryptSt($id));
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    } else {
        $sql = "INSERT INTO publicholidays (name, date, day) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $date, $day);
        if ($stmt->execute()) {
            $new_id = $conn->insert_id;
            $stmt->close();
            header("Location: ../?e=publicholidays&id=" . encryptSt($new_id) . "&success=publicholidays+created+successfully!");
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    }
    


} catch (Exception $e) {
    header("Location: ../?e=publicholidays&error=" . urlencode($e->getMessage()));
    exit();
}

$conn->close();
?>
