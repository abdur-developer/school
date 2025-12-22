<?php include("includes/dbcon.php"); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $image_url = $_POST['image_url'] ?? '';
    $category = $_POST['category'] ?? 'small';
    
    if (!empty($title) && !empty($image_url)) {
        
        // Get the max display order
        $result = $conn->query("SELECT MAX(display_order) as max_order FROM images");
        $row = $result->fetch_assoc();
        $display_order = ($row['max_order'] ?? 0) + 1;
        
        // Insert new image
        $stmt = $conn->prepare("INSERT INTO images (title, image_url, category, display_order) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $title, $image_url, $category, $display_order);
        
        if ($stmt->execute()) {
            $success = "Image added successfully!";
        } else {
            $error = "Error adding image: " . $conn->error;
        }
        
        $stmt->close();
        $conn->close();
    }
}

$sql = "SELECT * FROM images ORDER BY display_order ASC";
$result = $conn->query($sql);
$images = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Image Gallery</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            padding: 20px;
        }

        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 30px;
        }

        .form-container, .images-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 3px solid #4a6491;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        input[type="text"], select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e5eb;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, select:focus {
            outline: none;
            border-color: #4a6491;
        }

        .btn {
            background: linear-gradient(45deg, #4a6491, #2c3e50);
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 100%;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 100, 145, 0.3);
        }

        .message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .image-card {
            border: 1px solid #e1e5eb;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .image-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .image-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .image-info {
            padding: 15px;
        }

        .image-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .image-category {
            color: #666;
            font-size: 0.9rem;
            background: #f8f9fa;
            padding: 3px 8px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .admin-container {
                grid-template-columns: 1fr;
            }
            
            .images-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="form-container">
            <h2>Add New Image</h2>
            
            <?php if(isset($success)): ?>
                <div class="message success"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <?php if(isset($error)): ?>
                <div class="message error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="title">Image Title:</label>
                    <input type="text" id="title" name="title" required placeholder="Enter image title">
                </div>
                
                <div class="form-group">
                    <label for="image_url">Image URL:</label>
                    <input type="text" id="image_url" name="image_url" required placeholder="https://example.com/image.jpg">
                </div>
                
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category">
                        <option value="small">Small Image</option>
                        <option value="big">Big/Featured Image</option>
                    </select>
                </div>
                
                <button type="submit" class="btn">Add Image to Gallery</button>
            </form>
        </div>
        
        <div class="images-container">
            <h2>All Images (<?php echo count($images); ?>)</h2>
            
            <div class="images-grid">
                <?php foreach($images as $image): ?>
                    <div class="image-card">
                        <img src="<?php echo htmlspecialchars($image['image_url']); ?>" 
                             alt="<?php echo htmlspecialchars($image['title']); ?>">
                        <div class="image-info">
                            <div class="image-title"><?php echo htmlspecialchars($image['title']); ?></div>
                            <span class="image-category"><?php echo ucfirst($image['category']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>