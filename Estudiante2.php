<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Dr. José Manuel Siso Martínez</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/css.css" rel="stylesheet">

    <link rel="shortcut icon" href="./img/logo.jpg">

   <script type="text/javascript">
      //Ajusta el tamaño de un iframe al de su contenido interior para evitar scroll
      function validar(){
        //Validacion de Contraseñas para que sean iguales
        var dia1= document.consultarfecha.dia.value;
        var mes1= document.consultarfecha.mes.value;
        var anio1= document.consultarfecha.anio.value;
       
    
        if(dia1!=""){
            if(dia1<=0||dia1>31){
            alert("Por favor verifique el día ingresado...");
            return false;
            }
            if(mes1==0){
                alert("Por favor verifique el mes ingresado...");
                return false;
            }

            if(anio1==" "){
                alert("Por favor verifique el año ingresado...");
                return false;
            }
        }
        if(mes1!=0){
           if(anio1==""){
                alert("Por favor verifique el año ingresado...");
                return false;
            }
        }

        return true;
    
      }
      function nobackbutton(){
            window.location.hash="no-back-button";
            window.location.hash="Again-No-back-button";
            window.onhashchange=function(){window.location.hash="no-back-button";}
        }

    </script>
</head>

<body onload="nobackbutton();">
    
    <?php
        include_once("funciones_comunes.php");
        $email_usuario1=$_SESSION["email_usuario"];
    
        if(!Autenticado()){
            echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
        }

        $tipoU = Autenticado();
        
        $conexion = Conectar();
        $db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error al elegir la base de datos");

    ?>



    <div class="navbar-fixed-top">
        <!-- Marketing Icons Section -->
    <div class="row ">
        <div class="col-lg-12">
            <img src="./img/banner2.jpg" class="img " >
        </div>
        
    </div>
  
    <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Bienvenido.php"><span class="glyphicon glyphicon-home"></span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li >
                        <a href="Bienvenido.php">Inicio</a>
                    </li>
                    
                    <?php
                        if($tipoU=="SuperUser"){
                            echo'
                                <li>
                                    <a href="listadosolicitudes.php">Solicitudes</a>
                                </li>
                            ';
                        }
                    ?>

                    <li>
                        <a href="Estudiante2.php">Estudiantes</a>
                    </li>
                    
                    <?php
                        if($tipoU=="SuperUser"){
                            echo'
                                <li>
                                    <a href="Docentes.php">Docentes</a>
                                </li>
                            ';
                        }
                    ?>

                    <li>
                        <a href="consultarperiodo.php">Periodos</a>
                    </li>

                    <?php
                        if($tipoU=="SuperUser"){
                            echo'
                                <li>
                                    <a href="consultaranio.php">Años</a>
                                </li>
                                <li>
                                    <a href="consultarmaterias.php">Materias</a>
                                </li>
                                <li>
                                    <a href="consultarsecciones.php">Secciones</a>
                                </li>
                                <li>
                                    <a href="Noticias.php">Noticias</a>
                                </li>
                                <li>
                                    <a href="Usuario.php">Usuarios</a>
                                </li>
                            ';
                        }
                    ?>
                    <li>
                        <a href="cerrar sesion.php">Salir</a>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->

    </nav>

</div>
<br><br><br>
    <!-- Header Carousel -->
    

    <!-- Page Content -->
   <div class="container">
    <br><br>
        <!-- /.row -->
        <div class="row" >
           
            <div class="col-md-12" >                
                
                <?php
    echo'     

    <div class="row">
    <div class="col hidden-xs hidden-sm col-md-3 col-lg-3">
        <img src="img/estudiante.jpg" class="img img-responsive">

    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Consultar Estudiante</h4></center>
    </div>

    <form  action="consultardatosdeestudiante.php" method="GET">    
    <table align="center" class="table">
        <tr>
            <td>
                <input type="number" class="form-control" name="idsolicitud" placeholder="Cédula del Estudiante" required autofocus> 

            </td>
            
        </tr>
        <tr>
            <td>
                <button class="btn btn-default form-control fondogris letraroja btn-lg" type="submit">Buscar</button>   
            </td>
        </tr>


    </table>    
                    
    </form>

    </div>
    <div class="col hidden-xs hidden-sm col-md-3 col-lg-3">
        <img src="img/buscar.gif" class="img img-responsive">

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<br>
<div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Buscar Acontecimientos</h4></center>
    </div>
    <br>
<table align="center" width="100%">
                            <tr>
                            <form  action="Buscarhistoriageneralporfecha.php" method="POST" onSubmit="return validar();" name="consultarfecha"> 
                             <td>
                             <br>
                                <strong><i>Buscar por Fecha:</i> &nbsp;&nbsp;</strong>
                            </td>
                            <td>
                                <center><strong><i>Día</i></strong><br></center>
                                 <input type="number" name="dia" class="form-control"> 
                            </td>
                            <td>
                               <center><strong><i> Mes</i></strong><br></center>
                                 <select name="mes" class="form-control">
                                    <option value="0">Seleccione...</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </td>
                            <td>
                                <center><strong><i>Año</i></strong><br></center>
                                 <input type="number" name="anio" class="form-control" required> 
                            </td>
                            <td>
                                <br>
                                 <input type="submit" value="Buscar" class="btn btn-default form-control fondogris letraroja ">
                            </td>
                           
                                </form>
                            

                            </tr>
                            <tr>
                                <td colspan="5">
                                    <form action="buscarhistoriastodas.php" method="post">
                                    <br><br>
                                        <input type="submit" value="Ver todas las fechas (Últimas 500)" class="btn btn-default form-control fondogris letraroja ">

                                    </form>

                                </td>

                            </tr>

</table>  

<br><br><br><br><br>


    </div>
    </div>
    

 
            </div>
            
        </div>
        <!-- Portfolio Section -->
        <div class="row">
           <div class="col-md-12">
                         
           </div>
        </div>
        <!-- /.row -->

       <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <br><br>
                    <p>Ministerio del Poder Popular para la Educación Universitaria, Ciencia y Tecnología
                    <br>Unidad Educativa "Dr. José Manuel Siso Martínez". - Copyright &copy; 2016
                    
                </div>
            </div>
        </footer>

    </div>
    ';
    ?>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



</body>

</html>
