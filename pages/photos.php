<?php
    session_start();
    require_once '../config/config.php';


    //Obtener Fotos
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT intIdFoto, vchTitulo, vchDescripcion, vchFoto, boolEsPublico FROM foto WHERE boolEsPublico = 1";
    $statement = $conn->prepare($sql);
    $statement->execute();  
    $result =  $statement->fetchAll();

?>

<?php require_once 'header.php' ?>

    <div class="container">
        <h3 class="text-center mt-2">Fotos Públicas</h3>
        <div class="row">
            <?php foreach ($result as $key => $value):?>
                <div class="col-3">
                    <div class="card" style="width: 12rem;">
                        <img src="<?php echo $ruta ?>fotos/<?php echo $value['vchFoto']; ?>" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $value['vchTitulo']; ?></h5>
                            <p class="card-text"><?php echo $value['vchDescripcion']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php require_once 'footer.php' ?>