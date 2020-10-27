<?php 
    $title = "Login";
    require_once("./autoload.php");
    // kiểm tra đã login hay chưa
    if(isset($_SESSION['custom_id'])){
        header("location: index.php");
    }
    
    // kiểm tra xem có phải vừa đăng ký xong hay không
    if (isset($_GET['register_user']) && isset($_GET['register_pass'])) {
        $register_user = $_GET['register_user'];
        $register_pass = $_GET['register_pass'];
        array_push($success, "Thêm User ".$register_user." Thành Công!!! Hãy Đăng Nhập Ngay!");
    }

    // Chức năng Login
    if (isset($_POST['post_login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $userModel = new UserModel();
        $user = $userModel->getLogin($username,$password);
        if (count($user) > 0) {
            $_SESSION['custom_id'] = $user[0]['custom_id'];
            $_SESSION['user_type'] = $user[0]['user_type'];
            if (isset($_POST['remember'])) {
                //set cookie username và password
                setcookie("username",$username, time() + (86400 * 30)); 
                setcookie("password", $password, time() + (86400 * 30));
            }
            header("location: index.php");
        }else{
            array_push($errors, "Wrong username or password!!!");
        }

    }
    // include header
    require_once("./header.php");
?>
<!-- Content -->
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100 main">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="" method="post" class="border rounded bg-light shadow">
                    <div class="title-login bg-warning text-center text-white pt-2 pb-2 rounded-top "><h1>Login</h1></div>
                    <br>
                    <?php get_eroors($errors); get_success($success)?>
                    <div class="form-group pl-3 pr-3">
                        <label><b>Username</b></label>
                        <input  value="<?php if(isset($register_user)){echo $register_user;} elseif (isset($_COOKIE["username"])){echo $_COOKIE["username"];}?>" type="text" required name="username" class="form-control" placeholder="Nhập Username...">
                    </div>
                    <div class="form-group pl-3 pr-3">
                        <label><b>Password</b></label>
                        <input value="<?php if(isset($register_pass)){echo $register_pass;} elseif (isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>" type="password" required name="password" class="form-control" placeholder="Nhập Password...">
                    </div>
                    <div class="form-group pl-3 pr-3 d-flex justify-content-between">
                        <label class="btn btn-primary">
                            <input type="checkbox" name="remember" id=""> Remember Me
                        </label>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success" name="post_login" value="Login">
                    </div>
                    <div class="pl-3 pr-3 mb-3">
                        Not a member?<a href="register.php"> Sign Up now!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Content -->

<!-- include footer -->
<?php require_once("./footer.php"); ?>

