<?php
    session_start();
    require_once '../config/config.php';


    //Obtener Albumnes
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT intIdRegistro, vchIP, vchCountryName, vchLat, vchLng, dtmFechaRegistro FROM registro";
    $statement = $conn->prepare($sql);
    $statement->execute();  
    $result =  $statement->fetchAll();
    
?>

<?php require_once 'header.php' ?>
    <div class="container">
        <h3 class="text-center mt-2">Visitantes</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>IP</th>
                    <th>Pais</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Fecha Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $key => $value):?>
                    <tr>
                        <td><?php echo $value['intIdRegistro']; ?></td>
                        <td><?php echo $value['vchIP'] ?></td>
                        <td><?php echo $value['vchCountryName'] ?></td>
                        <td><?php echo $value['vchLat'] ?></td>
                        <td><?php echo $value['vchLng'] ?></td>
                        <td><?php echo $value['dtmFechaRegistro'] ?></td>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php require_once 'footer.php' ?>