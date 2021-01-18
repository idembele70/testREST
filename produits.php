
<?php
include('db_connect.php');
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'value':
        // if (!empty($_GET["id"])) {
        //     $id = intval($_GET["id"]);
        //     getProducts($id);
        // } else {
        //     getProducts();
        // }
        break;

    default:
        # code...
        break;
}

function getProducts()
{
    global $conn;
    $query = "SELECT * FROM produit";
    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

// function getProduct($id)
// {
//     global $conn;
//     $query = "SELECT * FROM produit WHERE id = '1'";
//     $result = mysqli_query($conn, $query);
//     if ($result) {
//         while ($row = mysqli_fetch_array($result)) {
//             
//     }
//     // header('Content-Type: application/json');
//     // echo json_encode($response, JSON_PRETTY_PRINT);
// }
?>