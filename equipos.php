<?php 
session_start(); 
?>
<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color: black">Equipos Disponibles
                    <small>Alta Tecnología HP</small>
                </h1>
            </div>
        </div>

<div class="container">
    <div class="row">
                <?php 
                    if (isset($_SESSION['usuario']))
                       {    
                          echo "<a href='index.php?art=solicitud1'>";
                        } else {
                           echo"<a href='index.php?art=nologin'>";
                       } 
                        ?>
                 <div class="col-md-6 portfolio-item">
                    <img class="img-responsive" src="image/op1.JPEG" alt="opcion1">
                <h2 style="color: black">
                 Servidor HP ProLiant ML310e Gen8 v2
                </h2>
                <p>Servidor HP ProLiant ML310e Gen8 v2 posee una alta gama de virtudes, el mejor servidor HP integrado a tu departamento.</p>
            </div>
            </a>

            <?php 
                    if (isset($_SESSION['usuario']))
                       {    
                          echo "<a href='index.php?art=solicitud2'>";
                        } else {
                           echo"<a href='index.php?art=nologin'>";
                       } 
                        ?>
            <div class="col-md-6 portfolio-item">
                    <img class="img-responsive" src="image/op2.jpg" alt="opcion3">
                <h2 style="color: black">
                All-in-One Pavilion 24-b007la
                </h2>
                <p>All-in-One Pavilion 24-b007la cubre todos los requerimientos en cualquier espacio, especial para diseñadores y arquitectos.</p>
            </div>

        </div>
        </a>
        <br>
        <br>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
        <?php 
                    if (isset($_SESSION['usuario']))
                       {    
                          echo "<a href='index.php?art=solicitud3'>";
                        } else {
                           echo"<a href='index.php?art=nologin'>";
                       } 
                        ?>
            <div class="col-md-6 portfolio-item">
                    <img class="img-responsive" src="image/op3.jpg" alt="opcion3">
                <h2 style="color: black">
                    WorkStation HP Z230
                </h2>
                <p>WorkStation HP Z230 es un sólido desktop pensado para gran funcionabilidad y amplitud en cualquier S.O y aplicación, especial para desarrolladores.</p>
            </div>
            </a>

            <?php 
                    if (isset($_SESSION['usuario']))
                       {    
                          echo "<a href='index.php?art=solicitud4'>";
                        } else {
                           echo"<a href='index.php?art=nologin'>";
                       } 
                        ?>
            <div class="col-md-6 portfolio-item">
                    <img class="img-responsive" src="image/op4.jpg" alt="opcion3">
                <h2 style="color: black">
                    Notebook HP ENVY 15-k049la
                </h2>
                <p>La portátil más veloz del mercado, dándote confiabilidad e integración en donde quieras.</p>
            </div>
        </div>
        <br><br>

 </div>