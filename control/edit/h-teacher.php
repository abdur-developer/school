<?php
    $id = isset($_GET['id']) ? decryptSt($_GET['id']) : 1;
    if($id != null){
        $sql = "SELECT * FROM `h-teacher` WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }else{
        $row = [
            'id' => null,
            'name' => null,
            'speech' => null,
            'fb' => null,
            'mail' => null,
            'phone' => null,
            'whatsapp' => null
        ];
    }
?>
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit h-teacher Details</h4>
                <a href="javascript:history.back()" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <!-- <php if ($result->num_rows > 0): ?> -->
            <form action="action/update_h_teacher.php" method="POST" class="needs-validation" novalidate>
                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                
                <div class="row g-4">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <!-- name -->
                        <div class="form-floating mb-4">
                            <input type="text" name="name" class="form-control" id="name" 
                                   value="<?= htmlspecialchars($row['name']) ?>" required>
                            <label for="name"><i class="fas fa-puzzle-piece me-1 text-muted"></i>name</label>
                            <div class="invalid-feedback">Please provide a name</div>
                        </div>
                        <!-- link -->
                        <div class="form-floating mb-4">
                            <input type="text" name="fb" class="form-control" id="fb" 
                                   value="<?= htmlspecialchars($row['fb']) ?>">
                            <label for="fb"><i class="fa-brands fa-facebook me-1 text-muted"></i>Facebook</label>
                            <div class="invalid-feedback">Please provide a link</div>
                        </div>
                        <!-- link -->
                        <div class="form-floating mb-4">
                            <input type="email" name="mail" class="form-control" id="mail" 
                                   value="<?= htmlspecialchars($row['mail']) ?>">
                            <label for="mail"><i class="fas fa-envelope me-1 text-muted"></i>Email</label>
                            <div class="invalid-feedback">Please provide a mail</div>
                        </div>
                        <!-- link -->
                        <div class="form-floating mb-4">
                            <input type="number" name="phone" class="form-control" id="phone" 
                                   value="<?= htmlspecialchars($row['phone']) ?>">
                            <label for="phone"><i class="fas fa-phone me-1 text-muted"></i>Phone</label>
                            <div class="invalid-feedback">Please provide a number</div>
                        </div>
                        <!-- link -->
                        <div class="form-floating mb-4">
                            <input type="number" name="whatsapp" class="form-control" id="whatsapp"
                                   value="<?= htmlspecialchars($row['whatsapp']) ?>">
                            <label for="whatsapp"><i class="fa-brands fa-whatsapp me-1 text-muted"></i>Whatsapp number without space</label>
                            <div class="invalid-feedback">Please provide a number</div>
                        </div>
                    </div>
                    
                    <!-- Right Column -->
                    <div class="col-md-6">
                        <!-- name -->
                        <div class="form-floating mb-4">
                            <label for="quill-editor" class="form-label">
                                <i class="fas fa-align-left me-1 text-muted"></i>speech
                            </label>
                            <div id="quill-editor" style="padding-top: 50px;">
                                <textarea id="tiny" name="speech" style="height: 200px; width: 100%; padding: 8px;"><?= $row['speech'] ?></textarea>
                            </div>
                            <!-- <small class="text-muted">Write detailed text with formatting options</small> -->
                        </div>
                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label class="form-label"><i class="fas fa-image me-1 text-muted"></i>Post Image</label>
                            <?php if (!empty($row['img'])): ?>
                                <div class="mb-3 text-center">
                                    <img src="../assets/img/a_rahman/<?= htmlspecialchars($row['img']) ?>" alt="Current Image" 
                                         class="img-thumbnail rounded" style="max-height: 200px;">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="remove_img" id="remove_img">
                                        <label class="form-check-label text-danger" for="remove_img">Remove current image</label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <input type="file" name="img" class="form-control" accept="image/*">
                            <small class="text-muted">Max size: 2MB (JPEG, PNG)</small>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="fas fa-undo me-1"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary px-4" id="submit-btn">
                        <i class="fas fa-save me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>