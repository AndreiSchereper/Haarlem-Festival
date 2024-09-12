<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>

<body>
    <?php include '../views/shareditems/nav/nav.php' ?>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <tr id="user">
                    <th scope="row">1</th>
                    <td>
                        <input type="text">
                    </td>
                    <td>
                        <input type="text">
                    </td>
                    <td>
                        <input type="text">
                    </td>
                    <td>
                        <input type="text">
                    </td>
                    <td>
                        <button>Update</button>
                    </td>

                </tr>

            </tbody>
        </table>
    </div>
    <?php include '../views/shareditems/footer/footer.php' ?>
    <script>
        // load all the users from api
        async function loadUsers() {
            const response = await fetch("http://localhost/api/users");
            const users = await response.json();
            const findUser = users.find(user => user.email === "johndoe@gmail.com");
            displayUserInfo(findUser);
        }
        // display the user info who is loged in
        function displayUserInfo(user) {
            const getTrId = document.getElementById("user");
            getTrId.innerHTML = `
                <td>${user.id}</td>
                <td><input type="text" id="firstName" value="${user.firstName}"></td>
                <td><input type="text" id="lastName" value="${user.lastName}"></td>
                <td><input type="email" id="email" value="${user.email}"></td>
                <td><input type="password" id="password" value="${user.hashedPassword}"></td>
                <td><button onclick="updateUser(${user.id})">Update</button></td>
            `;

        }
        function updateUser(id) {
            const firstName = document.getElementById("firstName").value;
            const lastName = document.getElementById("lastName").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            const updatedUser = {
                id: id,
                firstName: firstName,
                lastName: lastName,
                email: email,
                password: password
            };
            // Assuming this code is part of your client-side JavaScript
            fetch('http://localhost/api/users', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(updatedUser)
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => console.error('Error:', error));
        }
        loadUsers();
    </script>

</body>

</html>