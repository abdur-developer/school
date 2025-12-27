<?php
include_once "../../includes/dbcon.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../?e=staff&error=Invalid+request');
    exit();
}
// Get form data
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$title = trim($_POST['title']);
$phone = trim($_POST['phone']);

if (empty($name) || empty($title) || empty($phone)) {
    header("Location: ../?e=staff&error=all+fields+are+required.&id=".encryptSt($id));
    exit();
}

try {
    // Update or Insert
    if (!empty($id)) {
        $sql = "UPDATE staff SET name = ?, title = ?, phone = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi",  $name, $title, $phone, $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../?e=staff&success=staff+updated+successfully!&id=".encryptSt($id));
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    } else {
        $sql = "INSERT INTO staff (name, title, phone) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $title, $phone);
        if ($stmt->execute()) {
            $new_id = $conn->insert_id;
            $stmt->close();
            header("Location: ../?e=staff&id=" . encryptSt($new_id) . "&success=Staff+created+successfully!");
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    }
    


} catch (Exception $e) {
    header("Location: ../?e=staff&error=" . urlencode($e->getMessage()));
    exit();
}

$conn->close();
?>
