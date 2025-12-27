<?php
    $id = 1;
    $sql = "SELECT phone, mail, bottom_cover, logo, favicon, description FROM system_info WHERE id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
?>
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit School Details</h4>
                <a href="javascript:history.back()" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <form action="action/update_system.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="row g-4">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="form-floating mb-4">
                            <input type="tel" name="phone" class="form-control" id="phone" 
                                   value="<?= htmlspecialchars($row['phone']) ?>">
                            <label for="phone">Phone</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="email" name="mail" class="form-control" id="mail" 
                                   value="<?= htmlspecialchars($row['mail']) ?>">
                            <label for="mail">Email</label>
                        </div>
                        <!-- Bottom Cover Upload -->
                        <div class="mb-4">
                            <label class="form-label">Bottom Cover (1000*276)</label>
                            <?php if (!empty($row['bottom_cover'])): ?>
                            <div class="mb-3 text-center">
                                <img src="../assets/img/a_rahman/<?= htmlspecialchars($row['bottom_cover']) ?>" alt="Current Logo" 
                                class="img-thumbnail rounded" style="max-height: 150px;">
                            </div>
                            <?php endif; ?>
                            <input type="file" name="bottom_cover" class="form-control" accept="image/*">
                        </div>
                            
                        <!-- Favicon Upload -->
                        <!-- <div class="mb-4">
                            <label class="form-label">Favicon</label>
                            <php if (!empty($row['favicon'])): ?>
                            <div class="mb-3 text-center">
                                <img src="../assets/img/a_rahman/<= htmlspecialchars($row['favicon']) ?>" alt="Current Favicon" 
                                class="img-thumbnail rounded" style="max-height: 100px;">
                            </div>
                            <php endif; ?>
                            <input type="file" name="favicon" class="form-control" accept="image/*">
                        </div> -->
                        <!-- Logo Upload -->
                        <!-- <div class="mb-4">
                            <label class="form-label">Logo</label>
                            <php if (!empty($row['logo'])): ?>
                                <div class="mb-3 text-center">
                                    <img src="../assets/img/a_rahman/<= htmlspecialchars($row['logo']) ?>" alt="Current Logo" 
                                            class="img-thumbnail rounded" style="max-height: 150px;">
                                </div>
                            <php endif; ?>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                        </div> -->
                    </div>
                    
                    <!-- Right Column -->
                    <div class="col-md-6">
                        <!-- Description -->
                        <div class="mb-4">
                            <label for="tiny" class="form-label">Description</label>
                            <textarea id="tiny" name="description" style="height: 200px; width: 100%;"><?= htmlspecialchars($row['description']) ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="fas fa-undo me-1"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/dt45u81y65w6zsnvtlgdzdqqiifg3zjfsf8angmrgud3u0gp/tinymce/8/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#tiny',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap',
            'preview', 'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
            'insertdatetime', 'media', 'table', 'emoticons', 'wordcount'
        ],
        toolbar:
            'undo redo | styles | bold italic underline | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | ' +
            'link image media | code fullscreen preview | forecolor backcolor | ' +
            'charmap emoticons | removeformat preview',
        menubar: 'file edit view insert format tools help'
    });

    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })();
</script>