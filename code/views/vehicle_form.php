<?php require_once 'views/template/header.php'; ?>

<h2><?php echo isset($_GET['id']) ? 'Edit Vehicle' : 'Add New Vehicle'; ?></h2>

<form action="index.php?entity=vehicle&action=<?php echo isset($_GET['id']) ? 'update&id=' . $_GET['id'] : 'save'; ?>" method="POST" class="mb-4">
    <div class="mb-3">
        <label for="plate_number" class="form-label">Plate Number</label>
        <input type="text" class="form-control" id="plate_number" name="plate_number" required 
               value="<?php echo isset($vehicle['plate_number']) ? htmlspecialchars($vehicle['plate_number']) : ''; ?>">
    </div>
    
    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand" required
               value="<?php echo isset($vehicle['brand']) ? htmlspecialchars($vehicle['brand']) : ''; ?>">
    </div>
    
    <div class="mb-3">
        <label for="model" class="form-label">Model</label>
        <input type="text" class="form-control" id="model" name="model" required
               value="<?php echo isset($vehicle['model']) ? htmlspecialchars($vehicle['model']) : ''; ?>">
    </div>
    
    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" class="form-control" id="year" name="year" required
               value="<?php echo isset($vehicle['year']) ? htmlspecialchars($vehicle['year']) : ''; ?>">
    </div>
    
    <div class="mb-3">
        <label for="owner_name" class="form-label">Owner Name</label>
        <input type="text" class="form-control" id="owner_name" name="owner_name" required
               value="<?php echo isset($vehicle['owner_name']) ? htmlspecialchars($vehicle['owner_name']) : ''; ?>">
    </div>
    
    <div class="mb-3">
        <label for="owner_phone" class="form-label">Owner Phone</label>
        <input type="text" class="form-control" id="owner_phone" name="owner_phone" required
               value="<?php echo isset($vehicle['owner_phone']) ? htmlspecialchars($vehicle['owner_phone']) : ''; ?>">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="index.php?entity=vehicle" class="btn btn-secondary">Cancel</a>
</form>

<?php require_once 'views/template/footer.php'; ?>
