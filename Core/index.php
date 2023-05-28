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
        <main class="my-5 container d-flex align-items-center justify-content-center flex-column text-secondary">
            <div class="row col-11 mb-3">
                <h4 class="text-dark">Правильная конструкция дивана</h4>
                <img src="img/pc.png" alt="">
                <p class="col-12 col-md-10 lead">
                    Продуманная эргономика является признаком качества мебели.
                    Мы заботимся о том, чтобы конструкция моделей диванов соответствовала
                    их функциональному назначению: на диване для сна должно быть комфортно спать,
                    а на диване для отдыха сидя — удобно сидеть.
                </p>
            </div>
            <div class="row col-11 mb-3">
                <h4 class="text-dark">Качественные комплектующие</h4>
                <img src="img/case.jpg" alt="">
                <p class="col-12 col-md-10 lead">
                    Все комплектующие, используемые при производстве, отвечают европейскому
                    стандарту безопасности Е1. Мы применяем только современные, прочные,
                    долговечные и экологически чистые материалы.
                    Фурнитура, механизмы трансформации, ткани и кожа закупаются в основном
                    в Европе, а дерево — у российских поставщиков.
                </p>
            </div>
            <div class="row col-11 mb-3">
                <h4 class="text-dark">Технологичность и качество сборки</h4>
                <img src="img/mb.jpg" alt="">
                <p class="col-12 col-md-10 lead">
                    При производстве широко используются современные технологии,
                    автоматизированная работа оптимально совмещается с высококвалифицированным
                    ручным трудом.
                </p>
            </div>
            <div class="row col-11 mb-3">
                <h4 class="text-dark">Стиль</h4>
                <img src="img/cpu.jpg" alt="">
                <p class="col-12 col-md-10 lead">
                    Предлагая своим клиентам удобную, красивую и современную мебель,
                    мы тщательно следим за тем, чтобы она удовлетворяла самым высоким
                    требованиям, в том числе и эстетическим.
                </p>
            </div>
        </main>
    </div>

    <div class="item">
        <header class="my-md-5 container d-flex align-items-center justify-content-center">
            <div class="mt-4 row col-12">
                <h1 class="text-dark my-md-2 display-1 strong">
                    <strong class="">
                        Наш каталог
                    </strong>
                </h1>
                <p class="ms-1 text-dark lead mb-5">
                    - Мебель, которая определяет вашу индивидуальность.
                </p>
        </header>
        <main class="my-5 container d-flex align-items-center justify-content-center flex-column text-white-50">

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

            <div class="row col-11 mb-3">
                <div class="d-flex flex-column flex-md-row">
                    <img class=" col-12 col-md-4 me-3 border border-secondary"
                        src="<?php print('tovar/'.$row['img_src']); ?>" alt="">
                    <div>
                        <h3 class="text-dark my-1">
                            <?php print($row['name']); ?>
                        </h3>
                        <p class="col-12 col-md-6 d-flex flex-row">
                        <div class="col-12 text-dark ms-2 lead">
                            Цена:
                            <?php print($row['price']); ?>
                        </div>
                        <div class="col-12 text-dark ms-2 lead">
                            Цвет:
                            <?php print($row['color']); ?>
                        </div>
                        <div class="col-12 text-dark ms-2 lead">
                            Тип :
                            <?php print($row['type']); ?>
                        </div>
                        <div class="col-12 text-dark ms-2 lead">
                            Количество :
                            <?php print($row['amount']); ?>
                        </div>
                        </p>
                    </div>
                </div>
            </div>

            <?php }?>

        </main>
    </div>

</body>

</html>