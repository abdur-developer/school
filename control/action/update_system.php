<?php
include_once "../../includes/dbcon.php";
include_once "../upload_func.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../?q=system_info&error=Invalid+request');
    exit();
}

// Get form data
$id = 1;
$phone = trim($_POST['phone']);
$mail = trim($_POST['mail']);
$description = $_POST['description'];

if (empty($phone) || empty($mail)) {
    header("Location: ../?e=system&id=" . encryptSt($id) . "&error=Title+and+Organization+are+required+fields.");
    exit();
}

try {
    // $logo = null;
    // $favicon = null;
    $bottom_cover = null;

    // Get current images
    $current_img_stmt = $conn->prepare("SELECT favicon, logo, bottom_cover FROM system_info WHERE id = ?");
    $current_img_stmt->bind_param("i", $id);
    $current_img_stmt->execute();
    $current_img_result = $current_img_stmt->get_result()->fetch_assoc();
    $current_img_stmt->close();

    // $current_logo = $current_img_result['logo'] ?? null;
    // $current_favicon = $current_img_result['favicon'] ?? null;
    $current_bottom_cover = $current_img_result['bottom_cover'] ?? null;

    // Function to handle image upload
    function handleImageUpload($file, $current_img) {
        if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
            $upload = uploadImage($file);

            if ($upload['success']) {
                // Delete previous image if exists
                if (!empty($current_img) && file_exists('../assets/img/a_rahman/' . $current_img)) {
                    unlink('../assets/img/a_rahman/' . $current_img);
                }
                return basename($upload['target_file']);
            } else {
                throw new Exception($upload['message']);
            }
        }
        return $current_img; // Keep existing image if not uploaded
    }

    // Upload new images or keep existing
    // $logo = handleImageUpload($_FILES['logo'] ?? null, $current_logo);
    // $favicon = handleImageUpload($_FILES['favicon'] ?? null, $current_favicon);
    $bottom_cover = handleImageUpload($_FILES['bottom_cover'] ?? null, $current_bottom_cover);
    
    

    // Update // logo = ?, favicon = ?,
    $sql = "UPDATE system_info SET 
                phone = ?, mail = ?, description = ?, bottom_cover = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssi",
        $phone, $mail, $description, $bottom_cover, $id
    );//$logo, $favicon,
    
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: ../?e=system&id=" . encryptSt($id) . "&success=Post+updated+successfully!");
        exit();
    } else {
        throw new Exception("Database error: " . $stmt->error);
    }
    


} catch (Exception $e) {
    header("Location: ../?e=system&id=" . encryptSt($id) . "&error=" . urlencode($e->getMessage()));
    exit();
}

$conn->close();
?>