<?php
// database.php (Sample Database Connection)
$host = '127.0.0.1';
$db   = 'tigercommerce';
$user = 'root'; // Replace with your DB user
$pass = ''; // Replace with your DB password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Fetch Vendor Profile
$vendor_id = 1; // This should be dynamic based on logged-in vendor
$stmt = $pdo->prepare("SELECT * FROM vendors WHERE id = ?");
$stmt->execute([$vendor_id]);
$vendor = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            padding: 10px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
            text-decoration: none;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar">
            <h2 class="text-center">Vendor Dashboard</h2>
            <hr>
            <a href="#" onclick="showSection('profile')">Vendor Profile</a>
            <a href="#" onclick="showSection('orders')">Orders</a>
            <a href="#" onclick="showSection('products')">Products</a>
        </div>
        
        <!-- Content Area -->
        <div class="col-md-9 content">
            <!-- Vendor Profile Section -->
            <div id="profile-section" class="section">
                <h3>Vendor Profile</h3>
                <form id="profileForm">
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" value="Your Company Name">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3">Your company description...</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
            
            <!-- Orders Section -->
            <div id="orders-section" class="section" style="display:none;">
                <h3>Orders</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Product A</td>
                        <td>2</td>
                        <td>$40.00</td>
                        <td>Shipped</td>
                    </tr>
                    <!-- More orders can go here -->
                    </tbody>
                </table>
            </div>
            
            <!-- Products Section -->
            <div id="products-section" class="section" style="display:none;">
                <h3>Products</h3>
                <button class="btn btn-success mb-3">Add New Product</button>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>101</td>
                        <td>Product A</td>
                        <td>$20.00</td>
                        <td>50</td>
                        <td>Active</td>
                    </tr>
                    <!-- More products can go here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    // JavaScript to show and hide sections
    function showSection(section) {
        document.querySelectorAll('.section').forEach(el => el.style.display = 'none');
        document.getElementById(section + '-section').style.display = 'block';
    }
</script>
</body>
</html>
