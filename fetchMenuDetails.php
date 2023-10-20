<?php
if (isset($_GET['menu_id'])) {
    $menu_id = $_GET['menu_id'];

    $conn = new mysqli('localhost', 'root', '', 'pointofsale');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT menu_name, menu_desc, price FROM ref_menu WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $menu_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    }

    $stmt->close();
    $conn->close();
}
?>
