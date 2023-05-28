<?php
    include 'conbd.php';

    $sql = "INSERT INTO `Mebel` (`name`, `price`, `type`, `color`, `img_src`, `amount`) VALUES
            (
                '{$_POST['AddName']}',
                '{$_POST['AddPrice']}',
                '{$_POST['AddType']}',
                '{$_POST['AddColor']}',
                '{$_POST['AddImg']}',
                '{$_POST['AddAmount']}'
            );";

    if(mysqli_query($conn, $sql))
    {
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }

    $new_url = 'AddPage.php';
    header('Location: '.$new_url);
?>