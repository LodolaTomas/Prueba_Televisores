<?php
    require "./clases/Televisor.php";
    $arrayTelevisores=array();
    $televisorRamndon= new Televisor("","","");
    $arrayTelevisores= $televisorRamndon->Traer();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Televisores</title>
</head>
<body>
        <th><h4>Listado Televisores</h4></th>
        <tr><td colspan="3"><hr/></td></tr>
        <?php foreach ($arrayTelevisores as $key) { ?>
            <tr><th><h4><?php echo $key->ToString()?></h4></td><td><h4>Iva incluido=<?php echo $key->CalcularIVA()?></h4></td><td>Imagen?</td></th></tr>
        <?php } ?>
        <tr><td colspan="3"><hr/></td></tr>
</body>
</html>