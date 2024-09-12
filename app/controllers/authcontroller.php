<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/userService.php';
require_once __DIR__ . '/../models/user.php';

class AuthController extends Controller
{
    private $userService;

    // initialize services
    function __construct()
    {
        $this->userService = new UserService();
    }

    public function logout($query)
    {
        // session_start();
        // destroys the session to forget the user.
        session_unset();
        session_destroy();
        // redirect to home
        header("location: /");
        exit();
    }

    // public function password_creator($query)
    // {
    //     $pass = $_GET["password"];
    //     echo $this->userService->hashPassword($pass);
    // }

    // public function index($query) {
    //     $this->login($query);
    // }
    // public function login($query)
    // {
    //     // check if the user is already logged in.
    //     // if $_SESSION["loggedUser"] is set, it means the user has already logged in.
    //     // if the user is already logged in, redirect her to /home.
    //     if (isset($_SESSION["loggedUser"])) {
    //         // echo "you are already logged in";
    //         header("location: /home");
    //         exit();
    //     }
    //     // if the user has submitted a login request,
    //     // the form calls login again, but this time, the $_POST parameters
    //     // are set. So, we enter the else if.
    //     else if (isset($_POST["signInSubmit"]) && isset($_POST["username"]) && isset($_POST["pwd"])) {
    //         $inputUserName = $_POST["username"];
    //         $inputPassword = $_POST["pwd"];
    //         // using html special chars function to clean up the input
    //         $inputUserName = htmlspecialchars($inputUserName);
    //         $inputPassword = htmlspecialchars($inputPassword);
    //         // checkLogin method in UserService class checks if the user with the given username and password exists in the database. If it exits, it returns the user object, if it does not exists or the password is wrong, it returns null.
    //         $user = $this->userService->checkLogin($inputUserName, $inputPassword);

    //         if (isset($user) && $user != null) {
    //             // if the user exists in the database, log it in.
    //             // to show the user is logged in, we set the loggeUser value in $_SESSION dictionary. Then, we redirect to home.
    //             $_SESSION['loggedUser'] = $user;
    //             $_SESSION['userId'] = $user->getId();

    //             header("location: /home");
    //         } // if the username or password is wrong, we are here
    //         else {
    //             // displayView shows the contents of views/login/index.php
    //             // $this->displayView("Wrong Credentials. Try again.");
    //             $this->displayPageViewWithModel("auth/login", "Wrong Credentials. Try again.");
    //         }
    //     } // if the user is visiting the login page normally, show her the login page!
    //     else {
    //         // displayView shows the contents of views/login/index.php
    //         // $this->displayView(null);
    //         $this->displayPageViewWithModel("auth/login", null);
    //     }
    // }

    // public function register()
    // {
    //     // check if the user is already logged in.
    //     // if $_SESSION["loggedUser"] is set, it means the user has already logged in.
    //     // if the user is already logged in, redirect her to /home.
    //     if (isset($_SESSION["loggedUser"])) {
    //         // echo "you are already logged in";
    //         header("location: /home");
    //         exit();
    //     }
    //     $errorMessage = "";
    //     if (isset($_POST["registerBtn"])) {
    //         if (empty($_POST["firstName"])) {
    //             $errorMessage = "Please fill out your first name";
    //         } else if (empty($_POST["lastName"])) {
    //             $errorMessage = "Please fill out your last name";
    //         } else if (empty($_POST["email"])) {
    //             $errorMessage = "Please fill out your email";
    //         } else if (empty($_POST["password"])) {
    //             $errorMessage = "Please fill out your password";
    //         } else if ($_POST['password'] != $_POST['passwordConfirm']) {
    //             $errorMessage = "passwords do not match";
    //         } else {
    //             $errorMessage = $this->registerValidUser();
    //             //maybe show message instead of redirecting?
    //             if ($errorMessage  == "success") {
    //                 header("location: /auth/login");
    //                 exit();
    //             }
    //         }
    //     }
    //     else if(isset($_POST["forgotPassword"])) {
    //         $errorMessage = "forgot password is not implemented yet.";
    //     }
    //     // $this->displayView($errorMessage);
    //     $this->displayPageViewWithModel("auth/register", $errorMessage);
    // }

    // private function registerValidUser()
    // {
    //     // checkUserExistenceByEmail method checks to see if the email is already used or not. Returns true if it is already used.
    //     if ($this->userService->checkUserExistenceByEmail(htmlspecialchars($_POST["email"]))) {
    //         return "This email is already registered.";
    //     } else {
    //         return $this->createNewUser();
    //     }
    // }

    // createNewUser tries to create a new customer from the form data. returns 'success' if successful, othervise returns the error message to be shown to user.
    // private function createNewUser()
    // {
    //     $birthDateStr = htmlspecialchars($_POST["dateOfBirth"]);
    //     // $current_date is now
    //     $current_date = new DateTime();
    //     // createFromFormat tries to create a DateTime object from string. If not possible, returns false.
    //     $birthDate = DateTime::createFromFormat('Y-m-d', $birthDateStr);
    //     if ($birthDate === false ) {
    //         return "please input a valid date format (YYYY-MM-DD) for birthdate";
    //     }
    //     else if ($birthDate > $current_date) {
    //         return "Are you from the future?";
    //     } else {
    //         $newUser = array(
    //             "firstName" => htmlspecialchars($_POST["firstName"]),
    //             "lastName" => htmlspecialchars($_POST["lastName"]),
    //             "dateOfBirth" => htmlspecialchars($_POST["dateOfBirth"]),
    //             "email" => htmlspecialchars($_POST["email"]),
    //             "password" => htmlspecialchars($_POST["password"]),
    //             "role" => "Customer"
    //         );
    //         // registerUser in the userService creates a new user in the db
    //         $this->userService->registerUser($newUser);
    //         return "success";
    //     }
    // }

}