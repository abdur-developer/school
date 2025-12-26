<?php
include_once "../../includes/dbcon.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../?e=student_count&error=Invalid+request');
    exit();
}
// Get form data
$id = trim($_POST['id']);
$class_name = trim($_POST['class_name']);
$boys = trim($_POST['boys']);
$girls = trim($_POST['girls']);

if (empty($class_name) || empty($boys) || empty($girls)) {
    header("Location: ../?e=student_count&error=all+fields+are+required.&id=".encryptSt($id));
    exit();
}

try {
    // Update or Insert
    $sql = "UPDATE student_count SET class_name = ?, boys = ?, girls = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siii", $class_name, $boys, $girls, $id);
    
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: ../?e=student_count&success=student+count+updated+successfully!&id=".encryptSt($id));
        exit();
    } else {
        throw new Exception("Database error: " . $stmt->error);
    }
    


} catch (Exception $e) {
    header("Location: ../?e=student_count&error=" . urlencode($e->getMessage()));
    exit();
}

$conn->close();
?>
