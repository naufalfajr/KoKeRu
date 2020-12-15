
<?php
#File       : edit_jobdesk.php
    require_once('../functions/db_login.php');
    $idruang = $db->real_escape_string($_GET['idruang']);
    $idcs = $db->real_escape_string($_GET['idcs']);
    $query_cs = "SELECT nama_cs FROM cs WHERE idcs=".$idcs." ";
    $resultcs = $db->query($query_cs); 
    $namacs = $resultcs->fetch_object();
    #assign query
    $query = " UPDATE cs_ruang SET idcs=".$idcs.", nama_cs='".$namacs->nama_cs."' WHERE idruang=".$idruang." ";
    $result = $db->query($query);
    if (!$result) {
        echo '<div class="alert alert-danger alert-dismissible">
                <strong>Error!</strong> Could not query the database<br>
                '.$db->error.'<br>query = '.$query.
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
             </button></div>';
    }else {
        echo '<div class="alert alert-success alert-dismissible">
                <strong>Success!</strong> Data has been edited.<br>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
             </button></div>';
    }
    //close db connection
    $db->close();
?>