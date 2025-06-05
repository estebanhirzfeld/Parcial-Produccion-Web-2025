<?php
    require_once("connetion_with_function.php");
    $pdo = getPDO();
            //tarea repetitiva tiende a ser destructiva
    //create procedure nombre() query
            // function -> denotacional :: Retorna un valor
    //create procedure mostrar() select * from personas;

    //call nombre()
    //call mostrar()

    $proc = $pdo->prepare("call mostrar()");
    $result = $proc->execute();
?>