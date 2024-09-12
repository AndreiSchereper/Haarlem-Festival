<?php
require_once __DIR__ . '/../repositories/userrepository.php';

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }
    public function getUsers()
    {
        return $this->userRepository->getUsers();
    }
    public function userUpdateInfo($user){
        $this->userRepository->updateUserInfo($user);
    }
    public function insertUser($user){
        $this->userRepository->insertUser($user);
    }
    public function deleteUser($userId){
        $this->userRepository->deleteUser($userId);
    }
    // public function setReviewId(int $reviewId): self
    // public function checkLogin(string $userName, string $password)
    // {
    //     $user = $this->userRepository->login($userName, $password);
    //     if (isset($user) && $user != null) {
    //         return $user;
    //     }
    //     return null;
    // }

    // public function registerUser($newUser)
    // {
    //     $plainPassword = $newUser['password'];
    //     $newUser['password'] = $this->hashPassword($plainPassword);
    //     // registerUser in user userRepository saves the new user in db
    //     $this->userRepository->registerUser($newUser);
    // }

    // public function checkUserExistenceByEmail($email)
    // {
    //     return $this->userRepository->checkUserExistenceByEmail($email);
    // }

    // public function hashPassword($password)
    // {
    //     try {
    //         return password_hash($password, PASSWORD_DEFAULT);
    //     } catch (Exception $exception) {
    //         echo $exception->getMessage();
    //     }
    // }
}
