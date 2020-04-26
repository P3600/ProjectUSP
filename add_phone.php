<?php
    include 'phone_class.php';

    if(isset($_POST) && !empty($_POST)){
        try {
            $e = new Phone();
            $e->Name = $_POST['name'];
            $e->Price = $_POST['price'];
            $e->Display = $_POST['display'];
            $e->Ram = $_POST['ram'];
            $e->Rom = $_POST['rom'];
            $e->Battery = $_POST['battery'];
            $e->Processor = $_POST['processor'];
            $e->Color = $_POST['color'];
            $e->Manufacturer = $_POST['manufacturer'];
            $e->Camera = $_POST['camera'];
            $e->Opsys = $_POST['opsys'];
            //$e->Img = $_POST['img'];
            $msg = $e->AddPhone();
        }

        catch(Exception $e){
            $error = $e->getMessage();
        }


    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MPT - Add Phone</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">
    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Търсене</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Добави телефон</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h1 class="text-center">Добавяне на телефон</h1>

                <?php

                    if(isset($error) && !empty($error)){
                        echo '
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="alert alert-danger" role="alert">
                                      '.$error.'
                                    </div>
                                </div>
                            </div>
                        ';
                    }

                    if(isset($msg) && !empty($msg)){
                        echo '
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="alert alert-success" role="alert">
                                      '.$msg.'
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>

        <div class="row justify-content-md-center">
            <form class="col-md-6" method="post">
                <div class="input-group">
                    <label>Име</label>
                    <input name="name" type="text" class="form-control" placeholder="Име" aria-label="Име" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                    <label>Цена</label>
                    <input name="price" type="text" class="form-control" placeholder="Цена" aria-label="Цена" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                    <label>Дисплей</label>
                    <input name="display" type="text" class="form-control" placeholder="Дисплей" aria-label="Дисплей" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                    <label>Батерия</label>
                    <input name="battery" type="text" class="form-control" placeholder="Батерия" aria-label="Батерия" aria-describedby="basic-addon1">
                </div>
                <?php
                    foreach ($all_list as $all_key => $all_value) {
                        if($all_value['input_name'] == 'display' || $all_value['input_name'] == 'battery'){
                            continue;
                        }
                        
                        echo '
                            <div class="input-group">
                                <label>'.$all_value['name'].'</label>
                                <select name="'.$all_value['input_name'].'" class="form-control">
                        ';
                    
                        foreach ($all_value['list'] as $list_key => $list_value) {
                            $extra_input_text = '';

                            if($all_value['input_name'] == 'ram' || $all_value['input_name'] == 'rom'){
                                $extra_input_text = $gb_text;
                            }

                            if($all_value['input_name'] == 'camera'){
                                if(count($all_value['list'])-1 != $list_key){
                                    $extra_input_text = $mpx_text;
                                } 
                            }

                            if($all_value['input_name'] == 'processor'){
                                $extra_input_text = $proc_text;
                            }

                            echo '
                                <option value="'.$list_key.'">'.$list_value.$extra_input_text.'</option>
                            ';
                        }

                        echo'
                               </select>
                            </div>
                        ';
                    }
                ?>
                <div class="input-group ">
                    <button type="submit" class="btn btn-primary text-center">Добави</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
