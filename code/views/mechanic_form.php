<?php require_once 'views/template/header.php'; ?>

<h2><?php echo isset($_GET['id']) ? 'Edit Mechanic' : 'Add New Mechanic'; ?></h2>

<form action="index.php?entity=mechanic&action=<?php echo isset($_GET['id']) ? 'update&id=' . $_GET['id'] : 'save'; ?>" method="POST" class="mb-4">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required 
               value="<?php echo isset($mechanic['name']) ? htmlspecialchars($mechanic['name']) : ''; ?>">
    </div>
    
    <div class="mb-3">
        <label for="specialization" class="form-label">Specialization</label>
        <input type="text" class="form-control" id="specialization" name="specialization" required
               value="<?php echo isset($mechanic['specialization']) ? htmlspecialchars($mechanic['specialization']) : ''; ?>">
    </div>
    
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" required
               value="<?php echo isset($mechanic['phone']) ? htmlspecialchars($mechanic['phone']) : ''; ?>">
    </div>
    
    <div class="mb-3">
        <label for="experience_years" class="form-label">Experience Years</label>
        <input type="number" class="form-control" id="experience_years" name="experience_years" required
               value="<?php echo isset($mechanic['experience_years']) ? htmlspecialchars($mechanic['experience_years']) : ''; ?>">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="index.php?entity=mechanic" class="btn btn-secondary">Cancel</a>
</form>

<?php require_once 'views/template/footer.php'; ?>
