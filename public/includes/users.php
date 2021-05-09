<?php
include_once '../classes/userTable.class.php';
$obj = new UsersTable();

$rows = $obj->fetchUsers();

// print_r($rows);
// die("here");
?>
<div id="userstab" style="display:none;">
<div class="container-fluid"> 
<div class="row p-3 table-cont">
    <div class="table-responsive">
        <table class="table table-striped table-sm text-center shadow">
        <thead>
            <tr class="bg-dark text-white">
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Password</th>
            <th scope="col">Status</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col" class="border-0"></th>
            <th scope="col" class="border-0"></th>
            <th scope="col" class="border-0"></th>
            <th scope="col" class="border-0"></th>
            <th scope="col" class="border-0"></th>
            </tr>
        </thead>
            <tbody>
                <?php foreach ($rows as $row) { ?>
                <tr class="border">
                    <?php foreach ($row as $r) { ?>
                                <td><?php echo $r ?></td>      
                    <?php } ?>
                    <td class="border-left-0 border-right-0 border-top-0">
                        <a href="../includes/adminUserEditForm.php?id=<?php echo $row['id'] ?>" 
                        class="btn btn-primary btn-sm shadow-lg rounded-circle"
                         data-toggle="tooltip" data-placement="top" title="Edit"> 
                         <i class="fas fa-pen"></i>
                        </a>
                    </td>
                    <td class="border-left-0 border-right-0">
                        <a href="../backend/banUser.php?id=<?php echo $row['id'] ?>" 
                        class="btn btn-danger btn-sm shadow-lg rounded-circle"
                        data-toggle="tooltip" data-placement="top" title="Block">
                        <i class="fas fa-ban"></i>
                        </a>
                    </td>
                    <td class="border-left-0 border-right-0">
                        <a href="../backend/unbanUser.php?id=<?php echo $row['id'] ?>" 
                        class="btn btn-success btn-sm shadow-lg rounded-circle"
                        data-toggle="tooltip" data-placement="top" title="Unblock">
                        <i class="fas fa-lock-open"></i>
                        </a>
                    </td>
                    <td class="border-left-0 border-right-0">
                        <a href="../backend/makeAdmin.php?id=<?php echo $row['id'] ?>" 
                        class="btn btn-warning btn-sm shadow-lg rounded-circle"
                        data-toggle="tooltip" data-placement="top" title="Make Admin">
                        <i class="fas fa-user-shield"></i>
                        </a>
                    </td>
                    <td class="border-left-0">
                        <a href="../backend/makeNormal.php?id=<?php echo $row['id'] ?>" 
                        class="btn btn-info btn-sm shadow-lg rounded-circle"
                        data-toggle="tooltip" data-placement="top" title="Make Normal">
                        <i class="fas fa-user-tag"></i>
                        </a>
                    </td>
                </tr>  
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>
</div>
