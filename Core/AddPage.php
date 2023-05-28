<!DOCTYPE html>
<html lang="ru">

<head>
    <title>❤__О_НАС__❤</title>

    <link href="style.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Bootstrap JS + Popper JS -->
    <script defer src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <div class="bg-dark col-12">
        <div class="col-12 d-flex justify-content-end">
            <div class="mx-3 my-3">
                <a href="index.php" class="text-decoration-none text-white mx-1 my-1 px-1 py-1 rounded bg-dark">
                    Главная
                </a>
                <a href="AddPage.php" class="text-decoration-none text-white mx-1 my-1 px-1 py-1 rounded bg-dark">
                    Админ панель
                </a>
                <a href="type.php" class="text-decoration-none text-white mx-1 my-1 px-1 py-1 rounded bg-dark">
                    Инструменты
                </a>
            </div>
        </div>
    </div>

    <div class="item">
        <header class="bg-dark container-fluid d-flex align-items-end justify-content-end">
            <div class="container my-5">
                <div class="mt-4 row col-12">
                    <h1 class="text-light my-md-2 display-1 strong">
                        <strong class="">
                            Мебельная азбука
                        </strong>
                    </h1>
                    <p class="text-light ms-1 lead mb-5">
                        - Мебель, которая определяет вашу индивидуальность.
                    </p>
                </div>
            </div>
        </header>

        <main class="my-5 container d-flex align-items-center justify-content-center flex-column text-dark">
            <div class="col-12 d-flex flex-column-reverse flex-xxl-row">
                <div class="col-12 col-xxl-7 me-5">
                    <div>
                        <?php
                            include 'conbd.php';

                            $AddAmount = mysqli_num_rows(mysqli_query($conn, 'SELECT* FROM `Mebel`'));
                        ?>
                        <table class="table mb-4">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">type</th>
                                    <th scope="col">color </th>
                                    <th scope="col">img_src</th>
                                    <th scope="col">amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php          
                                    include 'conbd.php';                     
                                    for($i=1; $i<= mysqli_num_rows(mysqli_query($conn, 'SELECT * FROM `Mebel`'));$i++)
                                    {
                                        $row = mysqli_fetch_array(mysqli_query($conn,
                                        "SELECT 	
                                         id,
                                         name,
                                         price,
                                         (
                                           SELECT `type` 
                                           FROM `MebelSite`.`type` 
                                           WHERE `MebelSite`.`type`.`id` = `MebelSite`.`Mebel`.`type`
                                         ) AS 'type',
                                         (
                                           SELECT `color` 
                                           FROM `MebelSite`.`color` 
                                           WHERE `MebelSite`.`color`.`id` = `MebelSite`.`Mebel`.`color`
                                         ) AS 'color',
                                         img_src,
                                         amount
                                         FROM Mebel
                                         WHERE id = $i;"
                                         ));
                                ?>      
                                <tr>
                                    <th scope="row">
                                        <?php print($row['id']); ?>
                                    </th>
                                    <td>
                                        <?php print($row['name']); ?>
                                    </td>
                                    <td>
                                        <?php print($row['price']); ?>
                                    </td>
                                    <td>
                                        <?php print($row['type']); ?>
                                    </td>
                                    <td>
                                        <?php print($row['color']); ?>
                                    </td>
                                    <td>
                                        <?php print($row['img_src']); ?>
                                    </td>
                                    <td>
                                        <?php print($row['amount']); ?>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-xxl-5 my-5 my-md-0">
                    <form action="AddAction.php" method="post" class="">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Тип мебели</label>
                        
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Укажите наименование"
                                        aria-describedby="basic-addon2" name="AddName">
                                </div>
                            </div>
                        
                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Укажите стоимость"
                                        aria-describedby="basic-addon2" name="AddPrice">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Укажите количество"
                                        aria-describedby="basic-addon2" name="AddAmount">
                                </div>
                            </div>

                            <div class="mb-3">
                                <?php
                                    include 'conbd.php';
                                    $AddColorAmount = mysqli_num_rows(mysqli_query($conn, 'SELECT* FROM `color`'));
                                ?>
                                <select class="form-select" name="AddColor">
                                    <?php                               
                                        for($i=1; $i <= $AddColorAmount; $i++)
                                        {
                                            $row = mysqli_fetch_array(mysqli_query($conn,
                                            "SELECT * 
                                             FROM `color` 
                                             WHERE id = $i"
                                             ));
                                    ?>
                                        <option value="<?php print($row['id']); ?>">
                                            <?php print($row['color']); ?>
                                        </option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <?php
                                    include 'conbd.php';
                                    $AddTypeAmount = mysqli_num_rows(mysqli_query($conn, 'SELECT* FROM `type`'));
                                ?>                                
                                <select class="form-select" name="AddType">
                                    <?php                               
                                        for($i=1; $i <= $AddTypeAmount; $i++)
                                        {
                                            $row = mysqli_fetch_array(mysqli_query($conn,
                                            "SELECT * 
                                             FROM `type` 
                                             WHERE id = $i"
                                             ));
                                    ?>
                                        <option value="<?php print($row['id']); ?>">
                                            <?php print($row['type']); ?>
                                        </option>
                                    <?php }?>
                                </select>
                            </div>

                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Имя обложки"
                                        aria-describedby="basic-addon2" name="AddImg">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                                <div class="form-text">Добавить новый товар.</div>
                            </div>
                        </div>
                    </form>
                    <div class="lead d-none d-xxl-block">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum totam doloribus molestiae
                        reprehenderit perferendis, fugit sed libero asperiores in cupiditate possimus nostrum
                        recusandae? Rerum vel voluptas eaque harum pariatur, debitis neque magnam cumque quis officiis,
                        corporis ut provident sunt quaerat odit consequuntur omnis hic facilis! Dolores voluptas natus
                        voluptatem alias!
                    </div>
                </div>
            </div>
        </main>

    </div>
</body>

</html>