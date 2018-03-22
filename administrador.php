<?php session_start(); ?>

<div class="container">
  <div class="row" style="display:flex; justify-content:center; align-items:center;margin-top: 10%; height:80vh;">
    <div class="col-md-12 parrafo">
        <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>
        
    </div>
  </div>
</div>

<div class="clearfix" style="height: 15vh;"> </div>