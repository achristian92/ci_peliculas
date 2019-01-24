<?php
$CI = get_instance();
$positionParam = $this->uri->segment(3);
if($positionParam == 0){
    $peli[0]['id'] = "";
    $peli[0]['titulo'] = "";
    $peli[0]['resumen'] = "";
    $peli[0]['ano'] = "";
    $peli[0]['pais'] = "";
    $peli[0]['protagonistas'] = "";
}else{
    $CI->db->where('id',$positionParam);
    $peli = $CI->db->get('peliculas')->result_array();
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div  class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Gestor de peliculas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Agregar Peliculas</div>
                    <div class="panel-body">
                       <form action="<?= base_url('peliculasController/guardar'); ?>" method="post">
                           <div class="col-md-12 form-group input-group">
                               <input type="hidden" name="id" class="form-control" value="<?= $peli[0]['id'] ?>">
                           </div>
                           <div class="col-md-12 form-group input-group">
                               <label for="" class="input-group-addon">Titulo</label>
                               <input type="text" name="titulo" class="form-control" value="<?= $peli[0]['titulo'] ?>">
                           </div>
                           <div class="col-md-12 form-group input-group">
                               <label for="" class="input-group-addon">Resumen</label>
                               <input type="text" name="resumen" class="form-control" value="<?= $peli[0]['resumen'] ?>">
                           </div>
                           <div class="col-md-12 form-group input-group">
                               <label for="" class="input-group-addon">Año</label>
                               <input type="text" name="ano" class="form-control" value="<?= $peli[0]['ano'] ?>">
                           </div>
                           <div class="col-md-12 form-group input-group">
                               <label for="" class="input-group-addon">Pais</label>
                               <input type="text" name="pais" class="form-control" value="<?= $peli[0]['pais'] ?>">
                           </div>
                           <div class="col-md-12 form-group input-group">
                               <label for="" class="input-group-addon">Protagonista</label>
                               <input type="text" name="protagonistas" class="form-control" value="<?= $peli[0]['protagonistas'] ?>">
                           </div>
                           <div class="col-md-12 text-center">
                               <a class="btn btn-primary" href="<?php echo base_url("peliculasController/guardar/0"); ?>">Nueva Pelicula</a>
                               <button type="submit" class="btn btn-success">Guardar</button>
                           </div>

                       </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Peliculas Insertada</div>
                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>RESUMEN</th>
                            <th>AÑO</th>
                            <th>PAIS</th>
                            <th>PROTAGONISTA</th>
                            <th>ACCIONES</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $CI = get_instance();
                                    $peliculas = $CI->db->get('peliculas')->result_array();
                                    foreach($peliculas as $pelicula){
                                        $rutaEditar = base_url("peliculasController/guardar/{$pelicula['id']}");
                                        $rutaBorrar = base_url("peliculasController/borrar?borrar={$pelicula['id']}");

                                        echo "<tr>
                                                <td>{$pelicula['id']}</td>
                                                <td>{$pelicula['titulo']}</td>
                                                <td>{$pelicula['resumen']}</td>
                                                <td>{$pelicula['ano']}</td>
                                                <td>{$pelicula['pais']}</td>
                                                <td>{$pelicula['protagonistas']}</td>
                                                <td>
                                                 <a href='{$rutaEditar}' class='btn btn-info'>Editar</a>
                                                 <a href='{$rutaBorrar}' onclick ='return confirm(\"Realmente quiere Eliminar\"); 'class='btn btn-danger'>Borrar</a>
                                                </td>
</td>
                                            </tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>