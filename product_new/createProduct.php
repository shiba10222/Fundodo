<?php
require_once("../db_connect.php");

$sql = "SELECT * FROM productimages";
$result = $conn->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">

<head>
    <title>addProduct</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php include("css.php") ?>
    <style>
        .container {
            max-width: 600px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="mx-auto ">
            <h1 class="mb-3">新增商品</h1>
            <div class="text-end">
                <a href="product-list.php" class="btn btn-primary text-end"><i class="fa-solid fa-arrow-left"></i>回商品列表</a>
            </div>
            <form action="doCreateProduct.php" method="post" enctype="multipart/form-data">
                <div class="mb-2">
                    <label for="" class="form-label">商品名稱</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-2">
                    <label for="" class="form-label">商品描述</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div class="mb-2">
                    <label for="form-label" class="form-label">商品圖片</label>
                    <div></div>
                    <input type="file" class="form-control" name="images[]" multiple required>
                </div>
                <div class="mb-2">
                    <label for="" class="form-label">種類</label>
                    <select name="category" class="form-control">
                        <option selected>請選擇商品種類</option>
                        <?php $sqlCategory = "SELECT * FROM category";
                        $resultCategory = $conn->query($sqlCategory);
                        $rowCategory = $resultCategory->fetch_all(MYSQLI_ASSOC); ?>
                        <?php foreach ($rowCategory as $cate) : ?>
                            <option value=<?= $cate["id"] ?>><?= $cate["name"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="" class="form-label">品牌</label>
                    <select class="form-select" name="brand">
                        <option selected>請選擇品牌</option>
                        <?php $sqlBrand = "SELECT * FROM brands";
                        $resultBrand = $conn->query($sqlBrand);
                        $rows = $resultBrand->fetch_all(MYSQLI_ASSOC); ?>
                        <?php foreach ($rows as $item) : ?>
                            <option value="<?= $item["BrandID"] ?>"><?= $item["BrandName"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">商品口味</label>
                    <?php $sqlFlavor = "SELECT * FROM tags";
                    $resultFlavor = $conn->query($sqlFlavor);
                    $rowFlavor = $resultFlavor->fetch_all(MYSQLI_ASSOC); ?>
                    <?php foreach ($rowFlavor as $flavor) : ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="flavor<?= $flavor["TagID"] ?>" value=<?= $flavor["TagID"] ?> name="flavors[]">
                            <label class="form-check-label" for="flavor<?= $flavor["TagID"] ?>"><?= $flavor["TagName"] ?></label>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="mb-2">
                    <label for="" class="form-label">價格</label>
                    <input type="tel" class="form-control" name="price" required>
                </div>
                <div class="mb-2">
                    <label for="" class="form-label">上架數量</label>
                    <input type="tel" class="form-control" name="stock" required>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-primary" type="submit">送出</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>