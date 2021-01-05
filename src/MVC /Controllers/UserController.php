<?php
require_once '../MVC/Models/UserRepository.php';

/*
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{

    public function index()
    {
        $userRepository = new UserRepository();
        $view = new View('index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('create');
        $view->title = 'Registration';
        $view->heading = 'Registration';
        $view->display();
    }

    public function login()
    {
        $view = new View('login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }

    public function doLogin()
    {
        $userRepository = new UserRepository();
        $_SESSION['HashWarning'] = false;
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->readByUsernameEmailPassword($userName, $email, $password);

        if (null == $user) {
            $_SESSION["IsLoggedIn"] = false;
            $_SESSION["warnMsg"] = "Your username, email or password is incorrect";
            header('Location: /user/login');
            die();
        } else {
            $id = $user->id;
            $firstName = $user->firstName;
            $lastName = $user->lastName;
            $date = $user->date;
            $kanton = $user->kanton;
            $ort = $user->ort;
            $email = $user->email;
            $plz = $user->plz;
            $uploadfile = $user->profilePicture;

            $_SESSION["warnMsg"] = "You logged in successfully!";
            $_SESSION["IsLoggedIn"] = true;
            $_SESSION["Username"] = $userName;
            $_SESSION["UserID"] = $id;
            $_SESSION["LoggedInUser"] = array(
                $id,
                $userName,
                $firstName,
                $lastName,
                $email,
                $date,
                $kanton,
                $ort,
                $plz,
                $uploadfile
            );

            header('Location: /');
            die();
        }
    }

    public function logout()
    {
        unset($_SESSION["IsLoggedIn"]);
        session_destroy();
        header('Location: /user/login');
        die();
    }

    public function doCreate()
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $userName = $_POST['userName'];
        $date = $_POST['date'];
        $kanton = $_POST['kanton'];
        $ort = $_POST['ort'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $plz = $_POST['plz'];

        $uploaddir = 'ProfilePictures/'; // ProfilePictures
        $uploadfile = $uploaddir . basename($_FILES['profilePicture']['name']);
        move_uploaded_file($_FILES['profilePicture']['tmp_name'], $uploadfile);

        $userRepository = new UserRepository();
        $userRepository->create($firstName, $lastName, $userName, $email, $password, $date, $kanton, $ort, $plz, $uploadfile);

        header('Location: /user/login');
        die();
    }

    public function changePassword()
    {
        $view = new View('changePassword');
        $view->title = 'changePassword';
        $view->heading = 'changePassword';
        $view->display();
    }

    public function doChangePassword()
    {
       // $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $new_password_verification = $_POST['new_password_verification'];
        
        if($new_password == $new_password_verification){
            
        $userRepository = new UserRepository();
        $userRepository->changePassword($new_password, $_SESSION['UserID']);
        $_SESSION["infoMsg"] = "Your password has been changed";
        $_SESSION['password'] = sha1($new_password);
        header('Location: /');
        die();
    }
    else {
        $_SESSION["warnMsg"] = "Password not the same!";
        header('Location: /User/changePassword');
    }
    
    }

    public function changeEmail()
    {
        $view = new View('changeEmail');
        $view->title = 'changeEmail';
        $view->heading = 'changeEmail';
        $view->display();
    }

    public function doChangeEmail()
    {
        $new_email = $_POST['new_email'];
        $userRepository = new UserRepository();
        $userRepository->changeEmail($new_email, $_SESSION['UserID']);
        $_SESSION["infoMsg"] = "Your email has been changed";
        header('Location: /');
        die();
    }

    public function changeUsername()
    {
        $view = new View('changeUsername');
        $view->title = 'changeUsername';
        $view->heading = 'changeUsername';
        $view->display();
    }

    public function doChangeUsername()
    {
        $new_username = $_POST['new_username'];

        $userRepository = new UserRepository();
        $userRepository->changeUsername($new_username, $_SESSION["UserID"]);

        $_SESSION["infoMsg"] = "Your username has been changed to:" . " " . $new_username;
        $_SESSION['Username'] = $new_username;

        header('Location: /');
        die();
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        header('Location: /user');
        die();
    }
}   