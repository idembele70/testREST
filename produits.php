
<?php
include('db_connect.php');
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            getProduct($id);
        } else {
            getProducts();
        }
        break;
    case 'PUT':
        $id = intval($_GET['id']);
        updateProduct($id);
        break;

    case 'POST':
        addProduct();
        break;
    default:
        echo "Par defaut : ";
        getProducts();
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

function getProduct($id)
{
    global $conn;
    $query = "SELECT * FROM produit WHERE id = '" . $id . "'";
    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function updateProduct($id)
{
    global $conn;
    $_PUT = array();
    parse_str(file_get_contents('php://input'), $_PUT);
    $name = $_PUT['name'];
    $description = $_PUT['description'];
    $price = $_PUT['price'];
    // $category = $_PUT['category'];
    $created = 'NULL';
    $modified = date('Y-m-d H:i:s');
    $query = "UPDATE produit SET name = '" . $name . "', description = '" . $description . "', price = '" . $price . "', 
    modified = '" . $modified . "' WHERE id=" . $id;

    if (mysqli_query($conn, $query)) {
        $response = array(
            'status' => 1,
            'status_message' => 'Produit mis a jour avec succes.'
        );
    } else {
        $response = array(
            'status' => 1,
            'status_message' => 'Echec de la mise à jour de produit' . mysqli_error($conn)
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function addProduct()
{
    global $conn;
    $_POST = array();
    parse_str(file_get_contents('php://input'), $_POST);
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category_id'];
    $created = date('Y-m-d H:i:s');

    $query = "INSERT INTO produit (name, description, price, created, category_id) VALUES = ('" . $name . "',  = '" . $description . "',  = '" . $price . "', 
     = '" . $created . "',  = '" . $category . "') ";

    if (mysqli_query($conn, $query)) {
        $response = array(
            'status' => 1,
            'status_message' => 'Produit ajouté avec success.'
        );
    } else {
        $response = array(
            'status' => 1,
            'status_message' => 'Echec de l\'ajout du produit' . mysqli_error($conn)
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

?>