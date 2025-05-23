<?php require_once 'views/template/header.php'; ?>

<h2><?php echo isset($_GET['id']) ? 'Edit Service' : 'Add New Service'; ?></h2>

<form action="index.php?entity=service&action=<?php echo isset($_GET['id']) ? 'update&id=' . $_GET['id'] : 'save'; ?>" method="POST" class="mb-4">
    <div class="mb-3">
        <label for="vehicle_id" class="form-label">Vehicle</label>
        <select class="form-select" id="vehicle_id" name="vehicle_id" required>
            <option value="">Select Vehicle</option>
            <?php foreach ($vehicles as $vehicle): ?>
                <option value="<?php echo $vehicle['id']; ?>" <?php echo (isset($service['vehicle_id']) && $service['vehicle_id'] == $vehicle['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($vehicle['plate_number'] . ' - ' . $vehicle['brand'] . ' ' . $vehicle['model']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="mechanic_id" class="form-label">Mechanic</label>
        <select class="form-select" id="mechanic_id" name="mechanic_id" required>
            <option value="">Select Mechanic</option>
            <?php foreach ($mechanics as $mechanic): ?>
                <option value="<?php echo $mechanic['id']; ?>" <?php echo (isset($service['mechanic_id']) && $service['mechanic_id'] == $mechanic['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($mechanic['name'] . ' (' . $mechanic['specialization'] . ')'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="service_date" class="form-label">Service Date</label>
        <input type="date" class="form-control" id="service_date" name="service_date" required
               value="<?php echo isset($service['service_date']) ? htmlspecialchars($service['service_date']) : date('Y-m-d'); ?>">
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required><?php 
            echo isset($service['description']) ? htmlspecialchars($service['description']) : ''; 
        ?></textarea>
    </div>
    
    <div class="mb-3">
        <label for="cost" class="form-label">Cost</label>
        <input type="number" class="form-control" id="cost" name="cost" step="0.01" required
               value="<?php echo isset($service['cost']) ? htmlspecialchars($service['cost']) : ''; ?>">
    </div>
    
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
            <option value="pending" <?php echo (isset($service['status']) && $service['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
            <option value="in_progress" <?php echo (isset($service['status']) && $service['status'] == 'in_progress') ? 'selected' : ''; ?>>In Progress</option>
            <option value="completed" <?php echo (isset($service['status']) && $service['status'] == 'completed') ? 'selected' : ''; ?>>Completed</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="index.php?entity=service" class="btn btn-secondary">Cancel</a>
</form>

<?php require_once 'views/template/footer.php'; ?>
