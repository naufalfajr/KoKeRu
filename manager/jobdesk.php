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
            <div class="mdl-grid">
                <div class="mdl-layout-spacer"></div>
                <div class="mdl-cell mdl-cell--4-col">
                    <table class="mdl-data-table mdl-js-data-table">
                        <thead>
                            <tr>
                                <th>Ruang</th>
                                <th></th>
                                <th>Penanggung Jawab</th>
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
                                echo '<td>'.$row->nama_cs.'</td>';
                                echo '<td><a class="mdl-button mdl-js-button mdl-js-ripple-effect" style="font-size: 13px;" href="edit_jobdesk.php?id='.$row->idruang.'">
                                        <i class="material-icons" style="font-size: 16px;">create</i> edit</a></td>';
                                echo '</tr>';
                            }
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

<?php include("../templates/footer.php") ?>