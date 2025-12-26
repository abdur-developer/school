<?php
    $id = isset($_GET['id']) ? decryptSt($_GET['id']) : null;
    if($id != null){
        $sql = "SELECT * FROM teachers WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }else{
        $row = [
            'id' => null,
            'name' => null,
            'designation' => null,
            'joining_date' => "20-01-2005",
            'position' => null,
            'img' => null,
            'department' => null
        ];
    }
?>
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Teachers Details</h4>
                <a href="javascript:history.back()" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <!-- <php if ($result->num_rows > 0): ?> -->
            <form action="action/update_teachers.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                
                <div class="row g-4">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <!-- Title -->
                        <div class="form-floating mb-4">
                            <input type="text" name="name" class="form-control" id="name" 
                                   value="<?= htmlspecialchars($row['name']) ?>" required>
                            <label for="name"><i class="fas fa-heading me-1 text-muted"></i>Name</label>
                            <div class="invalid-feedback">Please provide a name</div>
                        </div>
                        <!-- Title -->
                        <div class="form-floating mb-4">
                            <input type="text" name="department" class="form-control" id="department" 
                                   value="<?= htmlspecialchars($row['department']) ?>" required>
                            <label for="department"><i class="fas fa-puzzle-piece me-1 text-muted"></i>department</label>
                            <div class="invalid-feedback">Please provide a department</div>
                        </div>
                        <!-- Title -->
                        <div class="form-floating mb-4">
                            <input type="date" name="joining_date" class="form-control" id="joining_date" 
                                   value="<?= date('Y-m-d', strtotime($row['joining_date'])) ?>" required>
                            <label for="joining_date"><i class="fas fa-calendar-days me-1 text-muted"></i>joining_date</label>
                            <div class="invalid-feedback">Please provide a joining_date</div>
                        </div>
                        <!-- Title -->
                        <div class="form-floating mb-4">
                            <input type="number" name="position" class="form-control" id="position" 
                                   value="<?= htmlspecialchars($row['position']) ?>" required>
                            <label for="position"><i class="fas fa-crosshairs me-1 text-muted"></i>position</label>
                            <div class="invalid-feedback">Please provide a position</div>
                        </div>
                    </div>
                    
                    <!-- Right Column -->
                    <div class="col-md-6">
                        <!-- designation -->
                        <div class="form-floating mb-4">
                            <input type="text" name="designation" class="form-control" id="designation" 
                                   value="<?= htmlspecialchars($row['designation']) ?>">
                            <label for="designation"><i class="fas fa-info-circle me-1 text-muted"></i>Designation</label>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label class="form-label"><i class="fas fa-image me-1 text-muted"></i>Post Image 2</label>
                            <?php if (!empty($row['img'])): ?>
                                <div class="mb-3 text-center">
                                    <img src="../assets/img/a_rahman/<?= htmlspecialchars($row['img']) ?>" alt="Current Image" 
                                         class="img-thumbnail rounded" style="max-height: 200px;">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="remove_img" id="remove_img">
                                        <label class="form-check-label text-danger" for="remove_img">
                                            Remove current image
                                        </label>
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