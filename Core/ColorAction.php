<?php
    include 'conbd.php';

    $sql = "INSERT INTO `color` (`color`) VALUES
            ('{$_POST['ColorName']}');";

    if(mysqli_query($conn, $sql))
    {
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }

    $new_url = 'type.php';
    header('Location: '.$new_url);
?>