<?php
include_once "../../includes/dbcon.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../?e=room&error=Invalid+request');
    exit();
}
// Get form data
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$num_of_room = trim($_POST['num_of_room']);

if (empty($name)) {
    header("Location: ../?e=room&error=all+fields+are+required.&id=".encryptSt($id));
    exit();
}

try {
    // Update or Insert
    if (!empty($id)) {
        $sql = "UPDATE 	room SET name = ?, num_of_room = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi",  $name, $num_of_room, $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../?e=room&success=student+count+updated+successfully!&id=".encryptSt($id));
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    } else {
        $sql = "INSERT INTO 	room (name, num_of_room) VALUES (?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $num_of_room);
        if ($stmt->execute()) {
            $new_id = $conn->insert_id;
            $stmt->close();
            header("Location: ../?e=room&id=" . encryptSt($new_id) . "&success=room+created+successfully!");
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    }
    


} catch (Exception $e) {
    header("Location: ../?e=room&error=" . urlencode($e->getMessage()));
    exit();
}

$conn->close();
?>
