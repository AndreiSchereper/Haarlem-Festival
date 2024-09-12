<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <?php include '../views/shareditems/nav/nav.php' ?>
    <div class="container">

        <!--Add  User modal-->
        <div>
            <!-- Button trigger modal -->
            <button type="button" data-bs-toggle="modal" data-bs-target="#addUser">
                Add User
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addUserLabel">Add User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addUserForm" class="mx-1 mx-md-4">
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="firstName" id="firstName" class="form-control" />
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="lastName" id="lastName" class="form-control" />
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" />
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option>customer</option>
                                            <option>employee</option>
                                            <option>admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button onclick="addUser();" type="button" class="btn btn-primary">Add User</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--Update  User modal-->

        <div>


            <!-- Modal -->
            <div class="modal fade" id="updateUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateUserLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="updateUserLabel">Update User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="updateUserForm" class="mx-1 mx-md-4">
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="firstName" id="updateFirstName" class="form-control" />
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="lastName" id="updateLastName" class="form-control" />
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" id="updateEmail" class="form-control" />
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label">Role</label>
                                        <select name="role" id="updateRole" class="form-control">
                                            <option>customer</option>
                                            <option>employee</option>
                                            <option>admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" id="updatePassword" class="form-control" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button onclick="updateUser();" type="button" class="btn btn-primary">Update User</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Registration Date</th>
                </tr>
            </thead>
            <tbody id="user">

            </tbody>
        </table>
    </div>
    <?php include '../views/shareditems/footer/footer.php' ?>
    <script>
        async function loadUsers() {
            const response = await fetch("http://localhost/api/users");
            const users = await response.json();
            displayUserInfo(users)
        }

        function displayUserInfo(users) {
            const getTrId = document.getElementById("user");
            users.forEach(user => {
                var firstName = user.firstName;
                var lastName = user.lastName;
                var fullName = firstName + lastName;
                getTrId.innerHTML += `
                <tr>
                    <td id="userId">${user.id}</td>
                    <td id="fullName"> ${fullName}</td>
                    <td id="email"> ${user.email}</td>
                    <td id="registrationDate"> ${user.registrationDate}</td>
                    <td>            
                        <button onclick="displayUserInfoForUpdateForm(${user.id})" type="button" data-bs-toggle="modal" data-bs-target="#updateUser">
                            Update User
                        </button>
                    </td>
                    <td><button onclick="deleteUser(${user.id})">Delete</button></td>

                </tr>
            `;
            });

        }

        async function addUser() {

            let formData = new FormData();
            let firstName = document.getElementById('firstName').value;
            let lastName = document.getElementById('lastName').value;
            let email = document.getElementById('email').value;
            let role = document.getElementById('role').value;
            let password = document.getElementById('password').value;

            formData.append('firstName', firstName);
            formData.append('lastName', lastName);
            formData.append('email', email);
            formData.append('role', role);
            formData.append('password', password);
            const response = await fetch('http://localhost/api/dashboard', {
                method: 'POST',
                body: formData,
            });

        }
        let id;
        async function displayUserInfoForUpdateForm(userId) {
            id = userId;
            const response = await fetch('http://localhost/api/users');
            const users = await response.json();
            const findUser = users.find(user => user.id == id);

            document.getElementById('updateFirstName').value = findUser.firstName;
            document.getElementById('updateLastName').value = findUser.lastName;
            document.getElementById('updateEmail').value = findUser.email;
            document.getElementById('updateRole').value = findUser.role;
            document.getElementById('updatePassword').value = findUser.password;


        }
        async function updateUser() {
            let updateFirstName = document.getElementById('updateFirstName').value;
            let updateLastName = document.getElementById('updateLastName').value;
            let updateEmail = document.getElementById('updateEmail').value;
            let updateRole = document.getElementById('updateRole').value;
            let updatePassword = document.getElementById('updatePassword').value;
            const updatedUser = {
                id: id,
                updateFirstName: updateFirstName,
                updateLastName: updateLastName,
                updateEmail: updateEmail,
                updateRole: updateRole,
                updatePassword: updatePassword
            };
            console.log(updatedUser);

            // Assuming this code is part of your client-side JavaScript
            fetch('http://localhost/api/dashboard', {
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
        async function deleteUser(userId) {
            const response = await fetch("http://localhost/api/users");
            const users = await response.json();
            const findUser = users.find(user => user.id == userId);
            const deleteUserId = {
                id: userId,
            };
            fetch('http://localhost/api/dashboard', {
                    method: 'DELETE',
                    body: JSON.stringify(deleteUserId)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => console.error('Error:', error));

        }

        loadUsers();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>