<?php 
    session_start();
    require_once '../config/config.php'; ?>
<?php require_once 'header.php'; ?>   
<?php 

 if ($_POST) {
    $nombre = htmlentities(trim($_POST["nombre"]));
    $correo = htmlentities(trim($_POST["correo"]));
    $pass = htmlentities(trim($_POST["password"]));
    
    //Obtener Usuario
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT intIdUsuario FROM usuario WHERE vchCorreo = ?";
    $statement = $conn->prepare($sql);
    $statement->bindParam(1, $correo);
    $statement->execute();  
    $result =  $statement->fetchAll(); 

        if (! $_POST
            || $nombre   === ''
            || $correo === ''
            || $password === ''
        ) {
            echo "<script>alert('Favor de llenar todos los campos')</script>";
        }else {
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "Connected successfully"; 
                $sql = "CALL insert_getLastId(?, ?, ?)";
                
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $nombre);
                $statement->bindParam(2, $correo);
                $statement->bindParam(3, $pass);

                if (count($result) == 0) {
                    $statement->execute();     
                    $id_registrado = $statement->fetchAll()[0]["ID"];
                    $_SESSION['login'] = array('id' => $id_registrado, 'nombre' => $nombre);
                    // echo "<script>alert('Registro completado')</script>";  
                    header("location:".$ruta."");  
                }else{
                    echo "<script>alert('Usuario ya registrado')</script>";
                }
              
            } catch(PDOException $e) {    
                echo "<script>alert('".$e."')</script>";
            }
        }
    }

?>

    <div class="container">
        <h2 class="text-center mt-2">Nuevo Usuario</h2>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="nombre" class="form-control" id="nombre" name="nombre" placeholder="Nombre:">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="correo" class="form-control" id="correo" name="correo" placeholder="Correo Electrónico:">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña:">
            </div>
            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Registrarse">
        </form>
    </div>

<?php require_once 'footer.php' ?>