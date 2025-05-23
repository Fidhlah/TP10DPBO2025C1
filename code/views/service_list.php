<?php require_once 'views/template/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Service List</h2>
    <a href="index.php?entity=service&action=add" class="btn btn-primary">Add New Service</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Vehicle</th>
                <th>Mechanic</th>
                <th>Service Date</th>
                <th>Description</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($serviceList as $service): ?>
                <tr>
                    <td><?php echo htmlspecialchars($service['plate_number'] . ' - ' . $service['brand'] . ' ' . $service['model']); ?></td>
                    <td><?php echo htmlspecialchars($service['mechanic_name']); ?></td>
                    <td><?php echo htmlspecialchars($service['service_date']); ?></td>
                    <td><?php echo htmlspecialchars($service['description']); ?></td>
                    <td><?php echo number_format($service['cost'], 2); ?></td>
                    <td>
                        <span class="badge bg-<?php 
                            echo $service['status'] == 'completed' ? 'success' : 
                                ($service['status'] == 'in_progress' ? 'warning' : 'secondary'); 
                        ?>">
                            <?php echo ucfirst(str_replace('_', ' ', $service['status'])); ?>
                        </span>
                    </td>
                    <td>
                        <a href="index.php?entity=service&action=edit&id=<?php echo $service['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="index.php?entity=service&action=delete&id=<?php echo $service['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'views/template/footer.php'; ?>
