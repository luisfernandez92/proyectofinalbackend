<?php
    session_start();
    require_once '../config/config.php';

if ($_POST) {
    $correo = htmlentities(trim($_POST["correo"]));
    $pass = htmlentities(trim($_POST["password"]));

    // print_r($foto);

        if (! $_POST
            || $correo   === ''
            || $pass === ''
        ) {
            echo "<script>alert('Favor de llenar todos los campos')</script>";
        }else {
            try {

                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "Connected successfully"; 
                $sql = "SELECT intIdUsuario, vchNombre, vchCorreo, vchPassword FROM usuario WHERE vchCorreo = ? AND vchPassword = ?";
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $correo);
                $statement->bindParam(2, $pass);

                
                $statement->execute();      
                
                $result = $statement->fetchAll();
                if (count($result) > 0) {
                    $_SESSION['login'] = array('id' => $result[0]['intIdUsuario'], 'nombre' => $result[0]['vchNombre']);
                    // echo "<script>window.location.replace('http://localhost/album/public_html/');</script>";
                    header("location:".$ruta."");
                }else{
                    echo "<script>alert('Correo y/o Contraseña incorrecta')</script>";
                }
                    
            } catch(PDOException $e) {    
                echo "<script>alert('".$e."')</script>";
            }
        }
    }
?>

<?php require_once 'header.php' ?>   

    <div class="container">
        <h2 class="text-center mt-2">Iniciar Sesión</h2>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="mb-3">
                <label for="titulo" class="form-label">Correo</label>
                <input type="correo" class="form-control" id="correo" name="correo" placeholder="Correo:">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña:">
            </div>
            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Iniciar Sesión">
        </form>
    </div>

<?php require_once 'footer.php' ?>