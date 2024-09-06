<?php

    define("CLIENTE_ID","Aaqtulm6bPk4pF4gpSfV4enUb3uVrmd9BT8P8JZUnpptLmXpncMVRc6jqL8rsrpbOgKfRwAbyHV-NKyg");
    define("CURRENCY", "USD");
    define("kEY_TOKEN", "HFEi4g7XMWfY");
    define("MONEDA", "$");

    session_start();
    $num_cart = 0;
    if(isset($_SESSION['carrito']['productos'])){
        $num_cart = count($_SESSION['carrito']['productos']);
    }

?>