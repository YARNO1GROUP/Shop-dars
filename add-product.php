<?php require('sections/head.php'); ?>

<!-- Navigation-->
<?php require('sections/menu.php'); ?>

<!-- Header-->
<?php require('sections/header.php'); ?>

<?php include('dbmysql.php'); ?>

<?php

if (isset($_POST['name']) && isset($_POST['price'])
    && isset($_POST['category_id']) && isset($_POST['instock'])
    && isset($_POST['description'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $instock = $_POST['instock'];
    $description = $_POST['description'];

    $insert_sql = "INSERT INTO product (name,price,categoriy_id, instock, description) 
    VALUES ('$name', $price,$category_id, $instock,'$description')";

    if($conn->query($insert_sql)){
        header("location: product.php");
    }
}

$cat_list = "SELECT * FROM category";
$cat_list = $conn->query($cat_list);
$cat_list = $cat_list->fetch_all(MYSQLI_ASSOC);

?>
<!-- Section-->
<div class="container">
    <h1>Mahsulotlar qo'shish</h1>
    <form action="add-product.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nomi</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Nomi">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Narxi</label>
            <input name="price" type="text" class="form-control" id="price" placeholder="Narxi">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label"> Kategoriyasi</label>
            <select class="form-select" name="category_id">
                <?php  foreach ($cat_list as $cat):?>
                    <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-3">
            <label for="instock" class="form-label">Miqdori</label>
            <input name="instock" type="text" class="form-control" id="instock" placeholder="Miqdori">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Umumiy ma'lumot</label>
            <textarea name="description" id="description" class="form-control" placeholder="Umumiy ma'lumotlar">Umumiy ma'lumotlar</textarea>
        </div>


        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Saqlash">
        </div>
    </form>
</div>
<!-

