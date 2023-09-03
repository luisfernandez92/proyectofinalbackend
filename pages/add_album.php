<?php
    session_start();
    require_once '../config/config.php';

    $idUsuario = $_SESSION['login']['id'];
    $idA = 0;

    //Obtener Albumnes
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT a.intIdAlbum, a.vchTitulo, a.vchDescripcion, (SELECT COUNT(intIdFoto) FROM foto WHERE intIdAlbum = a.intIdAlbum) AS total_fotos FROM album a WHERE intIdUsuario = ?";
    $statement = $conn->prepare($sql);
    $statement->bindParam(1, $idUsuario);
    $statement->execute();  
    $result =  $statement->fetchAll();
    
    if ($_POST) {
        $titulo = htmlentities(trim($_POST["titulo"]));
        $descripcion = htmlentities(trim($_POST["descripcion"]));

        // print_r($foto);

            if (! $_POST
                || $titulo   === ''
                || $descripcion === ''
            ) {
                echo "<script>alert('Favor de llenar todos los campos')</script>";
            }else {
                try {

                    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //echo "Connected successfully"; 
                    $sql = "INSERT INTO album (intIdUsuario, vchTitulo, vchDescripcion) VALUES (?, ?, ?)";
                    $statement = $conn->prepare($sql);
                    $statement->bindParam(1, $idUsuario);
                    $statement->bindParam(2, $titulo);
                    $statement->bindParam(3, $descripcion);
        
                    $statement->execute();         
                    
                    // echo "<script>window.location.replace('http://localhost/album/public_html/pages/add_album.php');</script>";
                    header("location:".$ruta."pages/add_album.php");
                } catch(PDOException $e) {    
                    echo "<script>alert('".$e."')</script>";
                }
            }
        }
?>

<?php require_once 'header.php' ?>


    <div class="container">
        <h3 class="text-center mt-2">Agregar Álbum</h3>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="titulo" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
            </div>
            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Guardar">
        </form>

        <br>
        <br>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Número de fotos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $key => $value):?>
                    <tr>
                        <td><?php echo $value['intIdAlbum']; ?></td>
                        <td><?php echo $value['vchTitulo'] ?></td>
                        <td><?php echo $value['vchDescripcion'] ?></td>
                        <td><?php echo $value['total_fotos'] ?></td>
                        <td>
                            <a href="<?php echo $ruta; ?>pages/add_photo.php?idAlbum=<?php echo $value['intIdAlbum']; ?>" class="btn btn-primary btn-sm">Agregar/Ver Fotos</a>
                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['intIdAlbum']; ?>">Eliminar Album</a>
                        </td>
                    </tr>                 
                    <div class="modal fade" id="exampleModal<?php echo $value['intIdAlbum']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Album</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Desea eliminar el Album <?php echo $value['intIdAlbum']; ?>?
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="<?php echo $ruta; ?>pages/delete_album.php?idAlbum=<?php echo $value['intIdAlbum']; ?>">Aceptar</a>
                                <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php require_once 'footer.php' ?>