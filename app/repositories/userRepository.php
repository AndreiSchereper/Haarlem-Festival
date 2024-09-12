<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/user.php';

class UserRepository extends Repository
{
    public function getUsers()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * From users");
            $stmt->execute();
            $users = $stmt->fetchAll();
            return $users;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function updateUserInfo($user)
    {
        try {
            // Sanitize data before inserting into the SQL query
            $firstName = $this->connection->quote($user->getFirstName());
            $lastName = $this->connection->quote($user->getLastName());
            $email = $this->connection->quote($user->getEmail());
            $hashedPassword = $this->connection->quote($user->getHashedPassword());
            $id = (int) $user->getId(); // Convert to integer for safety
            // Construct the SQL query
            $sql = "UPDATE users 
                SET firstName = $firstName, lastName = $lastName, email = $email, hashedPassword = $hashedPassword
                WHERE id = $id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function insertUser($user)
    {
        try {
            $role = $user->getRole();
            $firstName = $user->getFirstName();
            $lastName = $user->getLastName();
            $email = $user->getEmail();
            $hashedPassword = $user->getHashedPassword();

            $stmt = $this->connection->prepare("INSERT into users (role, firstName, lastName, email, hashedPassword, registrationDate) VALUES ('$role', '$firstName', '$lastName', '$email', '$hashedPassword', NOW())");

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error inserting user: " . $e->getMessage();
        }
    }
    public function deleteUser($userId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM users WHERE id = $userId");
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error inserting user: " . $e->getMessage();
        }
    }


    // public function login(string $userName, string $password)
    // {
    //     // error_log("Hashed Password: " . password_hash($password, PASSWORD_DEFAULT ) . "\n", 3, "log.txt");
    //     try {
    //         $stmt = $this->connection->prepare("SELECT * FROM user WHERE email = ?");
    //         $stmt->execute([$userName]);
    //         $rawUser = $stmt->fetch();
    //         // check if the username exists in the database.
    //         if ($rawUser != false) {
    //             $user = $this->createUserInstance($rawUser);
    //             // echo $user->getFirstName();
    //             // echo $user->getEmail();
    //             if (password_verify($password, $user->getHashedPassword())) {
    //                 // to increase the security, we delete the hashed password.
    //                 $user->setHashedPassword("");
    //                 return $user;
    //             }
    //         }
    //         // echo "no user found";
    //         return null;
    //     } catch (Exception | PDOException $e) {
    //         echo $e;
    //     }
    // }

    // private function createUserInstance($dbRow): User|null
    // {
    //     try {
    //         $user = new User();
    //         $user->setId($dbRow['id']);
    //         $user->setEmail($dbRow['email']);
    //         $user->setHashedPassword($dbRow['password']);
    //         $user->setRegistrationDate(new DateTime($dbRow['registrationDate']));
    //         $user->setRole($dbRow['role']);
    //         $user->setDateOfBirth(new DateTime($dbRow['dateOfBirth']));
    //         $user->setFirstName($dbRow['firstName']);
    //         $user->setLastName($dbRow['lastName']);
    //         $user->setPicture($dbRow['picture']);
    //         return $user;
    //     } catch (Exception $e) {
    //         echo "Error while creating user instance: " . $e->getMessage();
    //     }
    //     return null;
    // }

    // // registerUser tries to create an new user in db.
    // public function registerUser($newUser)
    // {
    //     try {
    //         $stmt = $this->connection->prepare("INSERT into user (firstName, lastName, dateOfBirth, email, password, role) VALUES (:firstName, :lastName, :dateOfBirth, :email, :password, :role)");
    //         // we use bindValue to increase security. Specifically, we are trying to prevent SQL injection attack.
    //         $stmt->bindValue(':firstName', $newUser["firstName"]);
    //         $stmt->bindValue(':lastName', $newUser["lastName"]);
    //         $stmt->bindValue(':dateOfBirth', $newUser["dateOfBirth"]);
    //         $stmt->bindValue(':email', $newUser["email"]);
    //         $stmt->bindValue(':password', $newUser['password']);
    //         $stmt->bindValue(':role', $newUser['role']);
    //         $stmt->execute();
    //         // use $this->connection->lastInsertId()
    //     } catch (PDOException $e) {
    //         echo $e;
    //     }
    // }

    // // checkUserExistenceByEmail checks to see if email is already used or not. Returns true if eamil is already used.
    // public function checkUserExistenceByEmail($email)
    // {
    //     try {
    //         $stmt = $this->connection->prepare("SELECT id From user WHERE email= :email");
    //         $stmt->bindValue(':email', $email);
    //         $stmt->execute();
    //         // if there are rows with email= :email, so rowCount > 0, it means the email is already used.
    //         if ($stmt->rowCount() > 0) {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     } catch (PDOException $e) {
    //         echo $e;
    //     }
    // }
}
