    <?php
    include 'koneksi.php';
    session_start();

    //cek username

    if (isset($_SESSION['username'])) {
        header("Location:/perpustakaan/index.php");
    }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($koneksi, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['level'] = $row['level'];
            $_SESSION['username'] = $row['username'];
            header("Location:/perpustakaan/index.php");
        } else {
            echo "<script>alert('Email or Password is wrong!!.')</script>";
        }
    }
