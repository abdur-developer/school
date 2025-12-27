<?php
include_once "../../includes/dbcon.php";
include_once "../upload_func.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../?e=h-teacher&error=Invalid+request');
    exit();
}
// Get form data
$id = $_POST['id'];
$name = trim($_POST['name']);
$speech = trim($_POST['speech']);
$fb = trim($_POST['fb']);
$mail = trim($_POST['mail']);
$whatsapp = trim($_POST['whatsapp']);
$phone = trim($_POST['phone']);

if (empty($name)) {
    header("Location: ../?e=h-teacher&error=link+are+required+fields.");
    exit();
}

try {
    $img_name = null;
    // Get current image (if exists)
    $current_img_stmt = $conn->prepare("SELECT img FROM `h-teacher` WHERE id = ?");
    $current_img_stmt->bind_param("i", $id);
    $current_img_stmt->execute();
    $current_img_result = $current_img_stmt->get_result()->fetch_assoc();

    $current_img = $current_img_result['img'] ?? null;
    $current_img_stmt->close();


    if ($remove_img && !$current_img) {
        if (file_exists('../../assets/img/a_rahman/' . $xx[1])) unlink('../../assets/img/a_rahman/' . $xx[1]);            
        $current_img = null;
    }

    // Function to handle image upload
    function handleImageUpload($file, $current_img) {
        if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
            $upload = uploadImage($file);

            if ($upload['success']) {
                // Delete previous image if exists
                if (!empty($current_img) && file_exists('../../assets/img/a_rahman/' . $current_img)) {
                    unlink('../../assets/img/a_rahman/' . $current_img);
                }
                return basename($upload['target_file']);
            } else {
                throw new Exception($upload['message']);
            }
        }
        return $current_img; // Keep existing image
    }

    // Upload new images
    try {
        $img_name = handleImageUpload($_FILES['img'], $current_img);
    } catch (Exception $e) {
        header("Location: ../?e=product&id=" . encryptSt($id) . "&error=" . urlencode($e->getMessage()));
        exit();
    }
    $sql = "UPDATE slider SET link = ?, img = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi",$link, $img_name, $id);
    
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: ../?e=h-teacher&success=slider+updated+successfully!");
        exit();
    } else {
        throw new Exception("Database error: " . $stmt->error);
    }


} catch (Exception $e) {
    header("Location: ../?e=h-teacher&error=" . urlencode($e->getMessage()));
    exit();
}

$conn->close();
?>