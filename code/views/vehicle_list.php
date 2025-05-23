<?php require_once 'views/template/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Vehicle List</h2>
    <a href="index.php?entity=vehicle&action=add" class="btn btn-primary">Add New Vehicle</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Plate Number</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Owner Name</th>
                <th>Owner Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicleList as $vehicle): ?>
                <tr>
                    <td><?php echo htmlspecialchars($vehicle['plate_number']); ?></td>
                    <td><?php echo htmlspecialchars($vehicle['brand']); ?></td>
                    <td><?php echo htmlspecialchars($vehicle['model']); ?></td>
                    <td><?php echo htmlspecialchars($vehicle['year']); ?></td>
                    <td><?php echo htmlspecialchars($vehicle['owner_name']); ?></td>
                    <td><?php echo htmlspecialchars($vehicle['owner_phone']); ?></td>
                    <td>
                        <a href="index.php?entity=vehicle&action=edit&id=<?php echo $vehicle['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="index.php?entity=vehicle&action=delete&id=<?php echo $vehicle['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'views/template/footer.php'; ?>
