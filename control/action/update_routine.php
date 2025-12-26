<?php
include_once "../../includes/dbcon.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../?e=routine&error=Invalid+request');
    exit();
}
// Get form data
$id = trim($_POST['id']);
$title = trim($_POST['title']);
$download_link = trim($_POST['download_link']);
$publish_date = trim($_POST['publish_date']);

if (empty($publish_date) || empty($title)) {
    header("Location: ../?e=routine&error=all+fields+are+required.&id=".encryptSt($id));
    exit();
}

try {
    // Update or Insert
    if (!empty($id)) {
        $sql = "UPDATE routine SET title = ?, download_link = ?, publish_date = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $title, $download_link, $publish_date, $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../?e=routine&success=student+count+updated+successfully!&id=".encryptSt($id));
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    } else {
        $sql = "INSERT INTO routine (title, download_link, publish_date) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $title, $download_link, $publish_date);
        if ($stmt->execute()) {
            $new_id = $conn->insert_id;
            $stmt->close();
            header("Location: ../?e=routine&id=" . encryptSt($new_id) . "&success=routine+created+successfully!");
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    }
    


} catch (Exception $e) {
    header("Location: ../?e=routine&error=" . urlencode($e->getMessage()));
    exit();
}

$conn->close();
?>
