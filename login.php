<?php
session_start(); //inisialisasi session
require_once('functions/db_login.php');

//cek apakah user sudah submit
if (isset($_POST['submit'])) {
    $valid = TRUE; //flagg
    //cek validasi email
    $email = test_input($_POST['email']);
    if ($email == '') {
        $error_email = "email is required";
        $valid = FALSE;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "invalid email format";
        $valid = FALSE;
    }

    //cek validasi password
    $password = test_input($_POST['password']);
    if ($password == "") {
        $error_password = "password is required";
        $valid = FALSE;
    }

    //cek validasi
    if ($valid) {
        //asign query
        $query = " SELECT * FROM cs WHERE email='" . $email . "' AND password='" . md5($password) . "' ";
        $query_manager = " SELECT * FROM manager WHERE email='" . $email . "' AND password='" . md5($password) . "' ";
        //execute query
        $result = $db->query($query);
        $result_manager = $db->query($query_manager);
        if (!$result || !$result_manager) {
            die('could not querry the databases: <br>' . $db->error);
        } else {

            if ($result->num_rows > 0) {   //login berhasil
                $row = $result->fetch_object();
                $_SESSION['nama'] = $row->nama_cs;
                header('location: ./');
                exit;
            } elseif ($result_manager->num_rows > 0) {
                $row = $result_manager->fetch_object();
                $_SESSION['nama'] = $row->nama_manager;
                header('location: manager/');
                exit;
            } else {   //login gagal
                $error_email = 'Combination of email and password are not correct';
                $error_password = 'Combination of email and password are not correct';
            }
        }
        //close db connection
        $db->close();
    }
}
?>

<?php include("templates/header.php") ?>

<!------------------------------------------------------------ NAVBAR ------------------------------------------------------------>
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">
            <span class="material-icons">
                cleaning_services
            </span>
            KoKeRu</span>
    </div>
</header>

<!------------------------------------------------------------ ISI ------------------------------------------------------------>
<main class="mdl-layout__content">
    <!-- content here -->
    <div class="page-content">
        <div class="pls-center">
            <div class="mdl-card mdl-shadow--6dp">
                <div class="mdl-card__title mdl-color--primary mdl-color-text--white relative">
                    <h2 class="mdl-card__title-text">
                        <span class="material-icons">
                            login
                        </span>
                        Login</h2>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" autocomplete="on">
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if (isset($error_email)) echo "is-invalid"; ?>" id="formEmail">
                            <input class="mdl-textfield__input" id="email" name="email" value="<?php if (isset($email)) echo $email; ?>" />
                            <label class="mdl-textfield__label" for="email">Email</label>
                            <span class="mdl-textfield__error"><?php if (isset($error_email)) echo $error_email; ?></span>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if (isset($error_password)) echo "is-invalid"; ?>" id="formPassword">
                            <input class="mdl-textfield__input" type="password" id="password" name="password" />
                            <label class="mdl-textfield__label" for="password">Password</label>
                            <span class="mdl-textfield__error"><?php if (isset($error_password)) echo $error_password; ?></span>
                        </div>
                    </div>
                    <div class="mdl-card__actions">
                        <button type="submit" name="submit" value="submit" class="mdl-cell mdl-cell--12-col mdl-button mdl-button--raised mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--white">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include("templates/footer.php") ?>