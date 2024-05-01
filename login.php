<?php
session_start();
?>
<?php
// Masukkan koneksi database Anda di sini
$db_host = 'localhost';
$db_username = 'admin';
$db_password = 'edworks1234';
$db_name = 'edworks';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sign-up process
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Periksa apakah email sudah terdaftar sebelumnya
    $check_email_sql = "SELECT * FROM user WHERE email='$email'";
    $check_email_result = $conn->query($check_email_sql);
    if ($check_email_result->num_rows > 0) {
        // Jika email sudah terdaftar, tampilkan pesan alert
        echo "<script>alert('Email is already used');</script>";
    } else {
        // Jika email belum terdaftar, lakukan proses sign-up
        // Enkripsi password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO user (nama, email, password) VALUES ('$name', '$email', '$hashed_password')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Sign up successful!";
            // Redirect to home.html or any other page
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Sign-in process
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Memindahkan ke sini

        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_email'] = $row['email']; // Menyimpan email pengguna di sesi
            $_SESSION['loggedin'] = true;
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Invalid email or password');</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }
}


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sticky-js@1.3.0/dist/sticky.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
</head>
<body style="--src:url(../assets/bg-archive.png)">
    <main class="home main" style="--src:url(../assets/bg-archive.png)">
    <br>
    <br>
    <div class="cont">
    <div class="top">
        <img class="logo" src="assets/4x5.png">
    </div>
    <form method="post" action="login.php">
        <div class="form sign-in">
            <h2>Welcome</h2>
            <label>
                <span>Email</span>
                <input type="email" name="email"/>
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="password"/>
            </label>
            <p class="forgot-pass">Forgot password?</p>
            <button type="submit" name="signin" class="submit">Sign In</button>
        </div>
    </form>
    <div class="sub-cont">
        <div class="img">
            <div class="img__text m--up">
                <h3>Don't have an account? Please Sign up!<h3>
            </div>
            <div class="img__text m--in">
                <h3>If you already has an account, just sign in.<h3>
            </div>
            <div class="img__btn">
                <span class="m--up">Sign Up</span>
                <span class="m--in">Sign In</span>
            </div>
        </div>
        <div class="top">
            <img class="logo" src="assets/4x5.png">
        </div>
        <form method="post" action="login.php">
            <div class="form sign-up">
                <h2 class="up">Create your Account</h2>
                <label>
                    <span>Name</span>
                    <input type="text" name="name" />
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email"/>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password"/>
                </label>
                <button type="submit" name="signup" class="submit">Sign Up</button>
            </div>
        </form>
    </div>
</div>
    </main>
    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
</body>
</html>