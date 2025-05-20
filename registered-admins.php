<?php include 'includes/ad-header.php'; ?>

<div class="page-content-wrapper">
    <div class="container-fluid">
        <!-- Page Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">RFZ Digital</a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Registered Admin</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Admin List</h4>
                </div>
            </div>
        </div>

        <!-- Not Registered Admins Table -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Not Registered Admins</h4>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Approved</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="not-approved-admins">
                                    <?php
                                    $stmt = $pdo->query("SELECT * FROM admins WHERE approved = 0");
                                    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($admins as $index => $admin) {
                                        echo "<tr id='admin-{$admin['id']}'>
                                            <td>" . ($index + 1) . "</td>
                                            <td>{$admin['username']}</td>
                                            <td>{$admin['email']}</td>
                                            <td>{$admin['password']}</td>
                                            <td>{$admin['role']}</td>
                                            <td>{$admin['approved']}</td>
                                            <td>{$admin['created_at']}</td>
                                            <td>
                                                <form action='approve-admin.php' method='POST'>
                                                    <input type='hidden' name='id' value='{$admin['id']}'>
                                                    <button type='submit' class='btn btn-sm btn-success'>Approve</button>
                                                </form>
                                                <form action='delete-admin.php' method='POST' style='display:inline;'>
                                            <input type='hidden' name='id' value='{$admin['id']}'>
                                            <button type='submit' class='btn btn-sm btn-danger'>Delete</button>
                                        </form>
                                            </td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Display Success or Danger Message -->
        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']; ?>
                
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <!-- Registered Admins Table -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Registered Admins</h4>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Approved</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="approved-admins">
                                    <?php
                                    $stmt = $pdo->query("SELECT * FROM admins WHERE approved = 1");
                                    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($admins as $index => $admin) {
                                        echo "<tr id='admin-{$admin['id']}'>
                                            <td>" . ($index + 1) . "</td>
                                            <td>{$admin['username']}</td>
                                            <td>{$admin['email']}</td>
                                            <td>{$admin['password']}</td>
                                            <td>{$admin['role']}</td>
                                            <td>{$admin['approved']}</td>
                                            <td>{$admin['created_at']}</td>
                                            <td>
                                                <form action='dis-approve-admin.php' method='POST'>
                                                    <input type='hidden' name='id' value='{$admin['id']}'>
                                                    <button type='submit' class='btn btn-sm btn-danger'>Delete</button>
                                                </form>
                                                 <button 
                                            class='btn btn-sm btn-warning change-password-btn' 
                                            data-id='{$admin['id']}' 
                                            data-username='{$admin['username']}'>
                                            Change Password
                                        </button>
                                            </td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </div>
</div>


   <!-- Change Password popup -->

<!-- Change Password Modal -->
<div class="modal" id="changePasswordModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="change-password.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" id="admin-id">
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" class="form-control" id="new-password" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const changePasswordButtons = document.querySelectorAll('.change-password-btn');
        const changePasswordModal = document.getElementById('changePasswordModal');
        const adminIdInput = document.getElementById('admin-id');
        const modalTitle = document.querySelector('.modal-title');

        changePasswordButtons.forEach(button => {
            button.addEventListener('click', function () {
                const adminId = this.getAttribute('data-id');
                const adminUsername = this.getAttribute('data-username');

                // Set modal data
                adminIdInput.value = adminId;
                modalTitle.textContent = `Change Password for ${adminUsername}`;

                // Show the modal
                $(changePasswordModal).modal('show');
            });
        });
    });
</script>

        <!-- Change Password popup -->


        
<?php include 'includes/ad-footer.php'; ?>
