<?php
    $id = isset($_GET['id']) ? decryptSt($_GET['id']) : null;
    if($id != null){
        $sql = "SELECT * FROM room WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }else{
        $row = [
            'id' => null,
            'name' => null,
            'num_of_room' => null,
        ];
    }
?>
<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Room Details</h4>
                <a href="javascript:history.back()" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <!-- <php if ($result->num_rows > 0): ?> -->
            <form action="action/update_room.php" method="POST" class="needs-validation" novalidate>
                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                
                <div class="row g-4">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <!-- Title -->
                        <div class="form-floating mb-4">
                            <input type="text" name="name" class="form-control" id="name" 
                                   value="<?= htmlspecialchars($row['name']) ?>" required>
                            <label for="name"><i class="fas fa-puzzle-piece me-1 text-muted"></i>Room name</label>
                            <div class="invalid-feedback">Please provide a title</div>
                        </div>
                    </div>
                    
                    <!-- Right Column -->
                    <div class="col-md-6">
                        <!-- Title -->
                        <div class="form-floating mb-4">
                            <input type="text" name="num_of_room" class="form-control" id="title" 
                                   value="<?= htmlspecialchars($row['num_of_room']) ?>" required>
                            <label for="title"><i class="fas fa-puzzle-piece me-1 text-muted"></i>Number of room</label>
                            <div class="invalid-feedback">Please provide a title</div>
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
<script>



// Set initial content from database
// quill.root.innerHTML = `<= $row['description'] ?>`;

// Form submission handler
// document.querySelector('form').addEventListener('submit', function(e) {
//     // Get HTML content from Quill and put it in hidden input
//     const quillHtml = document.getElementById('quill-html');
//     quillHtml.value = quill.root.innerHTML;
    
//     // Basic form validation
//     if (!this.checkValidity()) {
//         e.preventDefault();
//         e.stopPropagation();
//     }
//     this.classList.add('was-validated');
// });

// Form validation
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