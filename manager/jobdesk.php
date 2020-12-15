<?php include("templates/header.php") ?>

<!------------------------------------------------------------ NAVBAR ------------------------------------------------>
<?php include("templates/navbar.php") ?>

<!------------------------------------------------------------ SIDEBAR -----------------------------------------------
            Muncul ketika tombol menu di click -->
<?php include("templates/sidebar.php") ?>

<!------------------------------------------------------------ ISI --------------------------------------------------->
<main class="mdl-layout__content">
    <!-- content here -->
    <div class="page-content">
        <!-- Berisi nama gedung dan tanggal -->
        <section id="content-header"></section>
        <!-- bersisi card ruangan -->
        <section id="content-body">
            <div id="edit_response"></div>
            <div class="mdl-grid">
                <div class="mdl-layout-spacer"></div>
                <div class="mdl-cell mdl-cell--4-col">
                    <table class="mdl-data-table mdl-js-data-table">
                        <thead>
                            <tr>
                                <th><h5>Ruang</h5></th>
                                <th></th>
                                <th><h5>Penanggung Jawab</h5></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            #include our login information
                            require_once('../functions/db_login.php');
                            #assign a query
                            $query = " SELECT * FROM cs_ruang ORDER BY idruang";
                            #execute query
                            $result = $db->query($query);
                            if (!$result) {
                                die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
                            }
                            #fetch and display result
                            while ($row = $result->fetch_object()) {
                                echo '<tr>';
                                echo '<td>'.$row->nama_ruang.'</td>';
                                echo '<td>:</td>';
                                $idcs = $row->idcs;
                        ?>
                                <td><select name="cs" id="cs">
                        <?php
                                    $query_cs = " SELECT * FROM cs ORDER BY idcs ";
                                    $result_cs = $db->query($query_cs);
                                    if(!$result_cs){
                                        die ("Could not query the database: <br>".$db->error);
                                    }
                                    //Fetch and display the results
                                    while ($row_cs = $result_cs->fetch_object()) {
                        ?>
                                        <option value="<?php echo $row_cs->idcs; ?>" <?php if ($idcs == $row_cs->idcs) echo 'selected="true"'; ?>><?php echo $row_cs->nama_cs; ?></option>
                                    <?php } ?>
                                </select></td>
                        <?php
                                echo '<td><a class="mdl-button mdl-js-button mdl-js-ripple-effect" style="font-size: 13px;" onclick="edit_jobdesk('.$row->idruang.')">
                                        <i class="material-icons" style="font-size: 16px;">create</i> edit</a></td>';
                                echo '</tr>';
                            }
                            $result_cs->free();
                            $result->free();
                            $db->close();
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="mdl-layout-spacer"></div>
            </div>
        </section>
    </div>
</main>
<?php include("templates/footer.php") ?>