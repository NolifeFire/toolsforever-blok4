<?php
session_start();
require 'database.php';

// alleen admins
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    echo "Geen toegang";
    exit;
}

// aanpassen
if (isset($_POST['update'])) {
    $brand_id = $_POST['brand_id'];
    $brand_name = trim($_POST['brand_name']);

    if (empty($brand_name)) {
        echo "Naam mag niet leeg zijn";
        exit;
    }

    if (strlen($brand_name) > 50) {
        echo "Naam mag maximaal 50 karakters zijn";
        exit;
    }

    $brand_name = mysqli_real_escape_string($conn, $brand_name);

    $sql = "UPDATE brands 
            SET brand_name = '$brand_name' 
            WHERE brand_id = $brand_id";

    mysqli_query($conn, $sql);

    header("Location: brands_edit.php");
    exit;
}

// verwijderen
if (isset($_POST['delete'])) {
    $brand_id = $_POST['brand_id'];

    $sql = "DELETE FROM brands WHERE brand_id = $brand_id";
    mysqli_query($conn, $sql);

    header("Location: brands_edit.php");
    exit;
}

// toevoegen
if (isset($_POST['add'])) {
    $brand_name = trim($_POST['brand_name']);

    if (empty($brand_name)) {
        echo "Naam mag niet leeg zijn";
        exit;
    }

    if (strlen($brand_name) > 50) {
        echo "Naam mag maximaal 50 karakters zijn";
        exit;
    }

    $brand_name = mysqli_real_escape_string($conn, $brand_name);

    $sql = "INSERT INTO brands (brand_name) 
            VALUES ('$brand_name')";

    mysqli_query($conn, $sql);

    header("Location: brands_edit.php");
    exit;
}

$sql = "SELECT * FROM brands";
$result = mysqli_query($conn, $sql);
$brands = mysqli_fetch_all($result, MYSQLI_ASSOC);

require 'header.php';
?>

<main>

    <div class="container">
        <h1>Brands aanpassen</h1>
    </div>

    <div class="container">

        <h2>Nieuw merk toevoegen</h2>

        <form method="POST">
            <input 
                type="text" 
                name="brand_name" 
                placeholder="Nieuwe merknaam"
                maxlength="50"
            >

            <button type="submit" name="add">
                Toevoegen
            </button>
        </form>

        <hr>

        <?php foreach ($brands as $brand) : ?>

            <div class="brand-info">

                <img 
                    src="<?php echo isset($brand['brand_image']) ? 'images/' . $brand['brand_image'] : 'https://placehold.co/200' ?>" 
                    alt="<?php echo $brand['brand_name'] ?>"
                >

                <form method="POST">

                    <input 
                        type="hidden" 
                        name="brand_id" 
                        value="<?php echo $brand['brand_id']; ?>"
                    >

                    <input
                        type="text"
                        name="brand_name"
                        value="<?php echo $brand['brand_name']; ?>"
                        maxlength="50"
                    >

                    <br><br>

                    <button type="submit" name="update">
                        Opslaan
                    </button>

                    <button type="submit" name="delete">
                        Verwijderen
                    </button>

                </form>

            </div>

        <?php endforeach; ?>

    </div>

</main>

<?php require 'footer.php'; ?>s