<?php
include_once "../../includes/dbcon.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../?e=page&error=Invalid+request');
    exit();
}
// Get form data
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$html_txt = trim($_POST['html_txt']);

if (empty($name)) {
    header("Location: ../?e=page&error=all+fields+are+required.&id=".encryptSt($id));
    exit();
}

try {
    // Update or Insert
    if (!empty($id)) {
        $sql = "UPDATE 	custom_page SET name = ?, html_txt = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi",  $name, $html_txt, $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../?e=page&success=student+count+updated+successfully!&id=".encryptSt($id));
            exit();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
    } else {
        // $sql = "INSERT INTO 	custom_page (name, title, phone) VALUES (?, ?, ?)";

        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param("sss", $name, $title, $phone);
        // if ($stmt->execute()) {
        //     $new_id = $conn->insert_id;
        //     $stmt->close();
        //     header("Location: ../?e=page&id=" . encryptSt($new_id) . "&success=page+created+successfully!");
        //     exit();
        // } else {
        //     throw new Exception("Database error: " . $stmt->error);
        // }
    }
    


} catch (Exception $e) {
    header("Location: ../?e=page&error=" . urlencode($e->getMessage()));
    exit();
}

$conn->close();
?>
