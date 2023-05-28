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
            <div class="col-12 d-flex flex-column-reverse flex-md-row">
                <div class="col-11 col-md-5 me-5 d-flex justify-content-center">
                    <div class="col-12 col-md-7">
                        <?php
                            include 'conbd.php';

                            $TypeAmount = mysqli_num_rows(mysqli_query($conn, 'SELECT* FROM `type`'));
                            $ColorAmount = mysqli_num_rows(mysqli_query($conn, 'SELECT* FROM `color`'));
                        ?>   
                        <table class="table mb-4">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Тип</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                               
                                    for($i=$TypeAmount; $i; $i--)
                                    {
                                        $row = mysqli_fetch_array(mysqli_query($conn,
                                        "SELECT * 
                                         FROM `type`
                                         WHERE id = $i"
                                         ));
                                ?>    
                                    <tr>
                                        <th scope="row"> <?php print($row['id']); ?> </th>
                                        <td> <?php print($row['type']); ?>  </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Цвет</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                               
                                    for($i=$ColorAmount; $i; $i--)
                                    {
                                        $row = mysqli_fetch_array(mysqli_query($conn,
                                        "SELECT * 
                                         FROM `color`
                                         WHERE id = $i"
                                         ));
                                ?>  
                                    <tr>
                                        <th scope="row"> <?php print($row['id']); ?> </th>
                                        <td> <?php print($row['color']); ?>  </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-11 col-md-6 my-5 my-md-0">
                    <form action="TypeAction.php" method="post" class="ms-md-5">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Тип мебели</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Укажите тип" aria-describedby="basic-addon2" name="TypeName" >
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                                <div id="emailHelp" class="form-text">Добавить новый тип мебели.</div>
                            </div>
                        </div>
                    </form>
                    <form action="ColorAction.php" method="post" class="ms-md-5">
                        <div class="mb-5">
                            <label for="exampleInputEmail1" class="form-label">Цвет мебели</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Укажите цвет"aria-describedby="basic-addon2" name="ColorName" >
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                                <div id="emailHelp" class="form-text">Добавить новый цвет мебели.</div>
                            </div>
                        </div>
                    </form>
                    <div class="ms-md-5 lead d-none d-md-block">
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