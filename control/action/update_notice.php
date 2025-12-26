<?php
include_once "../../includes/dbcon.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../?e=notice&error=Invalid+request');
    exit();
}
// Get form data
$id = trim($_POST['id']);
$title = trim($_POST['title']);
$description = trim($_POST['description']);
$download_link = trim($_POST['download_link']);
$publish_date = trim($_POST['publish_date']);

if (empty($publish_date) || empty($title)) {
    header("Location: ../?e=notice&error=all+fields+are+required.&id=".encryptSt($id));
    exit();
}

try {
    // Update or Insert
    if (!empty($id)) {
        $sql = "UPDATE notice SET title = ?, download_link = ?, description = ?, publish_date = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $title, $download_link, $description, $publish_date, $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../?e=notice&success=student+count+updated+successfully!&id=".encryptSt($id));
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    } else {
        $sql = "INSERT INTO notice (title, download_link, description, publish_date) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $title, $download_link, $description, $publish_date);
        if ($stmt->execute()) {
            $new_id = $conn->insert_id;
            $stmt->close();
            header("Location: ../?e=notice&id=" . encryptSt($new_id) . "&success=notice+created+successfully!");
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    }
    


} catch (Exception $e) {
    header("Location: ../?e=notice&error=" . urlencode($e->getMessage()));
    exit();
}

$conn->close();
?>
