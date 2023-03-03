<?php require('sections/head.php')?>
<!-- Navigation-->
<?php require('sections/menu.php')?>
<!-- Header-->
<?php require('sections/header.php')?>
<?php include('dbmysql.php') ?>

<?php
$product_sql = "SELECT * FROM product ORDER BY id DECS";
$products = $conn->query($product_sql);
$products = $products->fetch_all(MYSQLI_ASSOC)
?>

<section class="py-5">
    <div class="Container px-4 px-lg-5 mt-5">
        <h1>Mahsulotlar ro'yxati</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nomi</th>
                <th scope="col">Narxi</th>
                <th scope="col">Kategoriyasi</th>
                <th scope="col">Miqdori</th>
                <th scope="col">Umumiy ma'lumotlar</th>
            </tr>
            </thead>
            <?php foreach ($products as $product):?>
                <tr>
                    <th scope="row"><?= $product['id'];?></th>
                    <td><?= $product['name'];?></td>
                    <td><?= $product['price'];?></td>
                    <td><?= $product['category_id'];?></td>
                    <td><?= $product['instock'];?></td>
                    <td><?= $product['descrition'];?></td>
                    <td>
                        <a href="edit-user.php?id=<?=$user['id'];?>" Class="btn btn-warning">O'zgartirish</a>
                        <a href="delete-user.php?id=<?=$user['id'];?>" Class="btn btn-danger">O'chirish</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</section>
