<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Profile</title>
</head>
<body>
    <!-- Profile Section in HTML -->
<div id="profile-section" class="section">
    <h3>Vendor Profile</h3>
    <form id="profileForm" method="POST" action="update_profile.php">
        <div class="mb-3">
            <label for="companyName" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="companyName" name="companyName" value="<?= htmlspecialchars($vendor['company_name']) ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($vendor['description']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

</body>
</html>