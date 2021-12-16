<?php
    include('dbconf.php');
    $ref_table = 'Data Sensor';
    $fetchdata = $database ->getReference( $ref_table)->getValue();
    if($fetchdata > 0){
    //var_dump($fetchdata);die;
    if ($fetchdata['Hujan'] >= 900){
        ?>
        <i class="fas fa-cloud"></i>;
        <?php
    }
    elseif (($fetchdata['Hujan'] >=800) && ($fetchdata['Hujan'] <900)) {
        ?>
        <i class="fas fa-cloud"></i>;
        <?php
    }
    else{
        ?>
        <i class="fas fa-cloud"></i>;
        <?php
    }
  }

?>
