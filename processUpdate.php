<?php
if (isset($_POST['menu_id']) && isset($_POST['menu_name']) && isset($_POST['menu_desc']) && isset($_POST['price'])) {
    $menu_id = $_POST['menu_id'];
    $menu_name = $_POST['menu_name'];
    $menu_desc = $_POST['menu_desc'];
    $price = $_POST['price'];

    $conn = new mysqli('localhost', 'root', '', 'pointofsale');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE ref_menu SET menu_name = ?, menu_desc = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $menu_name, $menu_desc, $price, $menu_id);
    $execval = $stmt->execute();

    if ($execval) {
        header('Location: updateMenu.php?status=success');
    } else {
        header('Location: updateMenu.php?status=error');
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: updateMenu.php');
}
?>
