<?php
require __DIR__ . '/../../services/userservice.php';

class DashboardController
{
    private $userService;
    function __construct()
    {
        $this->userService = new UserService();
    }
    public function index()
    {
        // Respond to a GET request to /api/users
        // if ($_SERVER["REQUEST_METHOD"] == "GET") {

        //     // return all users in the database as JSON
        //     $users = $this->userService->getUsers();
        //     $json = json_encode($users);
        //     header("Content-type: application/json");
        //     echo $json;
        // }
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //     // read JSON from the request, convert it to an article object
        //     // and have the service insert the article into the database

        // }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $role = $_POST['role'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $user->setRole($role);
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setEmail($email);
            $user->setHashedPassword($password);

            $this->userService->insertUser($user);
        }
        if ($_SERVER["REQUEST_METHOD"] == "PUT") {
            $json = file_get_contents('php://input');
            $object = json_decode($json);
            $user = new User();
            $user->setId($object->id);
            $user->setFirstName($object->updateFirstName);
            $user->setLastName($object->updateLastName);
            $user->setEmail($object->updateEmail);
            $user->setHashedPassword($object->updatePassword);
            $this->userService->userUpdateInfo($user);
        }
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            $json = file_get_contents('php://input');
            $object = json_decode($json);
            $userId = $object->id; // Assuming the id of the user to delete is passed in the request body
            $this->userService->deleteUser($userId);
        }
    }
}
