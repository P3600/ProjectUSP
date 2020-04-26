<?php
    include 'static_data.php';
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
        <form>
            <div class="sidebar-heading">Start Bootstrap </div>
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
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

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
        <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
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
