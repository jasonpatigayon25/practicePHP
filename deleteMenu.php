<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: lightyellow;
        }
        .container {
            margin-top: 20px;
        }
        h1 {
            color: #333366;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">PATIGAYON POS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="addMenu.php">Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menuList.php">Menu List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deleteMenu.php">Delete Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="updateMenu.php">Update Menu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Delete Menu</h1>
        <form action="processDelete.php" method="post">
            <div class="mb-3">
                <label for="menu_id" class="form-label">Select Menu to Delete by ID:</label>
                <select class="form-control" id="menu_id" name="menu_id">
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'pointofsale');

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT id, menu_name FROM ref_menu";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["id"] . " - " . $row["menu_name"] . "</option>";
                        }
                    } else {
                        echo "<option>No data found</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
