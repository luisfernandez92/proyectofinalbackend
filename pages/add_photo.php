<?php
    session_start();
    require_once '../config/config.php';

    $idAlbum = $_GET['idAlbum'];

    //Obtener Fotos del album
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT intIdFoto, intIdAlbum, vchTitulo, vchDescripcion, vchFoto, boolEsPublico FROM foto WHERE intIdAlbum = ?";
    $statement = $conn->prepare($sql);
    $statement->bindParam(1, $idAlbum);
    $statement->execute();  
    $result =  $statement->fetchAll(); 
    
    if ($_POST) {
        $titulo = htmlentities(trim($_POST["titulo"]));
        $descripcion = htmlentities(trim($_POST["descripcion"]));
        $foto = $_FILES["foto"];
        $fotoNombre = time().$foto["full_path"];
        $esPublico = $_POST["publico"];

        // print_r($foto);

            if (! $_POST
                || $titulo   === ''
                || $descripcion === ''
                || $foto === ''
            ) {
                echo "<script>alert('Favor de llenar todos los campos')</script>";
            }else {
                try {

                    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //echo "Connected successfully"; 
                    $sql = "INSERT INTO foto (intIdAlbum, vchTitulo, vchDescripcion, vchFoto, boolEsPublico) VALUES (?, ?, ?, ?, ?)";
                    $statement = $conn->prepare($sql);
                    $statement->bindParam(1, $idAlbum);
                    $statement->bindParam(2, $titulo);
                    $statement->bindParam(3, $descripcion);
                    $statement->bindParam(4, $fotoNombre);
                    $statement->bindParam(5, $esPublico);

                    $tmp_name = $foto["tmp_name"];
                    $name = basename(time().$foto["name"]);
                    move_uploaded_file($tmp_name, "../fotos/$name");
        
                    $statement->execute();         
                    
                    //*************Diferentes forma de reedireccionar.**************
                    // header('Refresh: 0'); // 0 = seconds
                    // header("Refresh:2; url=".$ruta."pages/add_photo.php?idAlbum=".$idAlbum."");
                    // echo "<script>window.location.replace('http://localhost/album/public_html/pages/add_photo.php?idAlbum='".$idAlbum."');</script>";
                    header("location:".$ruta."pages/add_photo.php?idAlbum=".$idAlbum."");
        
                } catch(PDOException $e) {    
                    echo "<script>alert('".$e."')</script>";
                }
            }
        }
?>

<?php require_once 'header.php' ?>

    <div class="container">
        <h2 class="text-center mt-2">Agregar Foto</h2>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <!-- <div class="mb-3">
                <label for="album" class="form-label">Selecciona un album</label>
                <select name="album" id="album" class="form-control">
                    <?php foreach ($result as $key => $value):?>
                        <option value="<?php echo $value['intIdAlbum']; ?>"><?php echo $value['vchTitulo']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div> -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="titulo" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Elegir foto:</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <div class="mb-3">
                <label for="esPublico" class="form-label">¿Es Publico?</label>
                <select name="publico" id="" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
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
                    <th>Album</th>
                    <th>¿Es Publico?</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $key => $value):?>
                    <tr>
                        <td><?php echo $value['intIdFoto'] ?></td>
                        <td><?php echo $value['vchTitulo'] ?></td>
                        <td><?php echo $value['vchDescripcion'] ?></td>
                        <td><?php echo $value['intIdAlbum'] ?></td>
                        <td><?php echo $value['boolEsPublico'] ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalOtro<?php echo $value['vchFoto']; ?>">Ver Foto</a>
                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['intIdFoto']; ?>">Eliminar Foto</a>
                        </td>
                    </tr>
                    <!-- MODAL ELEMINAR FOTO -->
                    <div class="modal fade" id="exampleModal<?php echo $value['intIdFoto']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Foto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Desea eliminar la foto <?php echo $value['intIdFoto']; ?>?
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="<?php echo $ruta; ?>pages/delete_photo.php?idFoto=<?php echo $value['intIdFoto']; ?>&idAlbum=<?php echo $idAlbum; ?>">Aceptar</a>
                                <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- MODAL VER FOTO -->
                    <div class="modal fade" id="exampleModalOtro<?php echo $value['vchFoto']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $value['vchFoto']; ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="marco-foto text-center">
                                    <img src="<?php echo $ruta; ?>fotos/<?php echo $value['vchFoto']; ?>" width="200" alt="" class="img-fluid">                     
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" data-bs-dismiss="modal">Aceptar</a>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require_once 'footer.php' ?>