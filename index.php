<?php
    include 'server.php';

    $phone_arr = getSearchList();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MPT - Search</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <form method="post">
            <div class="sidebar-heading"><button type="submit" class="btn btn-success text-center">Търси</button> </div>
            <div class="list-group list-group-flush">
                <?php
                    foreach ($all_list as $all_key => $all_value) {
                        echo '
                            <a href="#collapse_'.$all_value['input_name'].'" aria-controls="collapse_'.$all_value['input_name'].'"class="list-group-item list-group-item-action bg-light" 
                              data-toggle="collapse" role="button" aria-expanded="true">'.$all_value['name'].'

                            </a>
                            <div class="collapse show" id="collapse_'.$all_value['input_name'].'">
                                <ul class="input_select">
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
                                <li>
                                    <label for="'.$all_value['input_name'].'_'.$list_key.'"> 
                                      <input id="'.$all_value['input_name'].'_'.$list_key.'" name="'.$all_value['input_name'].'[]" value="'.$list_key.'" type="checkbox">
                                      <span>'.$list_value.$extra_input_text.'</span>
                                    </label>
                                </li>
                            ';
                        }

                        echo'
                                </ul>
                            </div>
                        ';
                    }
                ?>

            </div>
        </form>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Меню за търсене</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Търсене</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_phone.php">Добави телефон</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">Списък с телефони</h1>
        <div class="phone_list">
            <?php 
                if(is_array($phone_arr) && !empty($phone_arr)){
                    echo'
                        <div class="row">
                    ';
                    foreach ($phone_arr as $phone_key => $phone_value) {
                        echo'
                            <div class="phone_holder col-md-6 col-lg-4">
                                <img class="img-fluid" src="https://via.placeholder.com/300.png/bfbfbf/000">
                                <span class="phone_price">'.$phone_value->getProp('price').' лв.</span>
                                <h3 class="phone_title">'.$phone_value->getProp('name').'</h3>
                                

                                <ul class="phone_info_holder">
                        ';

                        foreach ($all_list as $all_key => $all_value) {
                            $extra_input_text = '';


                            if($all_value['input_name'] == 'ram' || $all_value['input_name'] == 'rom'){
                                $extra_input_text = $gb_text;
                            }

                            if($all_value['input_name'] == 'camera'){
                                if(count($all_value['list'])-1 != $phone_value->getProp($all_value['input_name'])){
                                    $extra_input_text = $mpx_text;
                                } 
                            }

                            if($all_value['input_name'] == 'processor'){
                                $extra_input_text = $proc_text;
                            }

                            

                            if($all_value['input_name'] == 'display' ){
                                $extra_input_text = $inch_text;
                                $li_info = $phone_value->getProp($all_value['input_name']).$extra_input_text;
                            }
                            elseif($all_value['input_name'] == 'battery'){
                                $extra_input_text = $mah_text;
                                $li_info = $phone_value->getProp($all_value['input_name']).$extra_input_text;
                            }
                            else{
                                $li_info = $all_value['list'][$phone_value->getProp($all_value['input_name'])].$extra_input_text;
                            }

                            echo '
                                <li>'.$all_value['name'].': '.$li_info.'</li>
                            ';
                            
                        }

                        echo '
                                </ul>
                            </div>
                        ';

                        if($phone_key+1%3 == 0){
                            echo'
                                </div>
                                <div class="row">
                            ';
                        }
                       // echo "<pre>" . print_r($phone_value->Name, true) . "</pre>";
                       // echo "<pre>" . print_r($phone_value->Price, true) . "</pre>";
                       // echo "<pre>" . print_r($phone_value->Display, true) . "</pre>";
                       // echo "<pre>" . print_r($phone_value->Ram, true) . "</pre>";
                       // echo "<pre>" . print_r($phone_value->Rom, true) . "</pre>";
                       // echo "<pre>" . print_r($phone_value->Camera, true) . "</pre>";
                       // echo "<pre>" . print_r($phone_value->Battery, true) . "</pre>";
                       // echo "<pre>" . print_r($phone_value->Processor, true) . "</pre>";
                       // echo "<pre>" . print_r($phone_value->Color, true) . "</pre>";
                       // echo "<pre>" . print_r($phone_value->Opsys, true) . "</pre>";
                       // echo "<pre>" . print_r($phone_value->Manufacturer, true) . "</pre>";
                    }
                    echo'
                        </div>
                    ';
                }

            ?>
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
