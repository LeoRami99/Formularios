<?php
    $mysqli = new mysqli("localhost", "pruebawp_form", ";68af+qUC6VO", "pruebawp_formularios");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    echo $mysqli->host_info . "\n";
    // declaración de variables para el formulario
    $partido_politico="";
    $aspira_militante="";
    $cargo_asp="";
    $info_militante="";
    $tipo_doc="";
    $num_doc="";
    $fecha_exp="";
    $ciudad_exp="";
    $nombres="";
    $apellidos="";
    $genero="";
    $fecha_nacimiento="";
    $n_educativo="";
    $oficio="";
    $poblacion="";
    $celular="";
    $email="";
    $pais="";
    $departamento="";
    $municipio="";
    $direccion="";
    $localidad="";
    $archivo="";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $partido_politico = $_POST['partido_politico'];
        $aspira_militante = $_POST['aspira_militante'];
        $cargo_asp = $_POST['cargo_asp'];
        $info_militante = $_POST['info_militante'];
        $tipo_doc = $_POST['tipo_doc'];
        $num_doc = $_POST['num_doc'];
        $fecha_exp = $_POST['fecha_exp'];
        $ciudad_exp = $_POST['ciudad_exp'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $genero = $_POST['genero'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $n_educativo = $_POST['n_educativo'];
        $oficio = $_POST['oficio'];
        $poblacion = $_POST['poblacion'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $pais = $_POST['pais'];
        $departamento = $_POST['departamento'];
        $municipio = $_POST['municipio'];
        $direccion = $_POST['direccion'];
        $localidad = $_POST['localidad'];
        
        //   si es militante no es necesario que suba el archivo
      if ($aspira_militante == "militante") {
        $archivo = "no aplica";
      }else{
        

        $nombre_archivo = $_FILES['archivo']['name'];
        if($nombre_archivo == ""){
            echo "
              <script>
                alert('No se ha seleccionado ningun archivo');
                window.location.href = '../index.html';
              </script>
            ";
            die();
        }else{

          $archivo = $nombre_archivo;
          $tipo_archivo = $_FILES['archivo']['type'];
          $tamanio_archivo = $_FILES['archivo']['size'];
          $ruta_archivo = $_FILES['archivo']['tmp_name'];
          $destino_archivo = '../archivos/'.$nombre_archivo;
          if(move_uploaded_file($ruta_archivo, $destino_archivo)){
            echo "Archivo subido correctamente";
            
          }{
            echo "Error al subir el archivo";
          }
        }
      }



        // enviar los datos a la base de datos
        $sql = "INSERT INTO `datosFormulario` (`colectividad`, `asp_mil`, `cargo_asp`, `actividad_mil`, `tip_doc`, `num_doc`, `fecha_exp_doc`, `ciudad_exp`, `nombres`, `apellidos`, `genero`, `fecha_ncto`, `nvl_educativo`, `oficio`, `tipo_poblacion`, `num_celular`, `correo`, `pais`, `departamento`, `cod_municipio`, `dc_residencia`, `localidad`, `archivo_nombre`) VALUES ('$partido_politico', '$aspira_militante', '$cargo_asp', '$info_militante', '$tipo_doc', '$num_doc', '$fecha_exp', '$ciudad_exp', '$nombres', '$apellidos', '$genero', '$fecha_nacimiento', '$n_educativo', '$oficio', '$poblacion', '$celular', '$email', '$pais', '$departamento', '$municipio', '$direccion', '$localidad', '$archivo');";
        // $mysqli->query($sql);
        // $mysqli->close();
        // si envio los datos correctamente
        // redireccionar a la pagina de inicio
        // Con una alerta de exito
        if ($mysqli->query($sql) === TRUE) {
            echo '<script>
            alert("Formulario enviado con éxito");
            window.location.href = "../index.html";
            </script>';
          } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
          }


        // header('Location: ../formularios/../index.html');
        // echo '<script>alert("Formulario enviado con exito");</script>';



        // // imprimir toda la informacion del formulario
        // echo $partido_politico . "\n";
        // echo $aspira_militante. "\n";
        // echo $cargo_asp. "\n";
        // echo $info_militante. "\n";
        // echo $tipo_doc . "\n";
        // echo $num_doc. "\n";
        // echo $fecha_exp. "\n";
        // echo $ciudad_exp. "\n";
        // echo $nombres. "\n";
        // echo $apellidos. "\n";
        // echo $genero. "\n";
        // echo $fecha_nacimiento. "\n";
        // echo $n_educativo. "\n";
        // echo $oficio. "\n";
        // echo $poblacion. "\n";
        // echo $celular. "\n";
        // echo $email. "\n";
        // echo $pais. "\n";
        // echo $departamento. "\n";
        // echo $municipio. "\n";
        // echo $direccion. "\n";
        // echo $localidad. "\n";
    }else{
        // redireccionar a la pagina de inicio
        // Con una alerta de error
        echo '<script>
            alert("Error al enviar el formulario");
            window.location.href = "../index.html";
          </script>';
    }
?>