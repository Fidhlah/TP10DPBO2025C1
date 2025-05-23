<?php require_once 'views/template/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Mechanic List</h2>
    <a href="index.php?entity=mechanic&action=add" class="btn btn-primary">Add New Mechanic</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Specialization</th>
                <th>Phone</th>
                <th>Experience Years</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mechanicList as $mechanic): ?>
                <tr>
                    <td><?php echo htmlspecialchars($mechanic['name']); ?></td>
                    <td><?php echo htmlspecialchars($mechanic['specialization']); ?></td>
                    <td><?php echo htmlspecialchars($mechanic['phone']); ?></td>
                    <td><?php echo htmlspecialchars($mechanic['experience_years']); ?></td>
                    <td>
                        <a href="index.php?entity=mechanic&action=edit&id=<?php echo $mechanic['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="index.php?entity=mechanic&action=delete&id=<?php echo $mechanic['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'views/template/footer.php'; ?>
