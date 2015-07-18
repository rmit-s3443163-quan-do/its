<?php


require_once('./controller/UserCtrl.php');

$arr = UserCtrl::getUserList();

?>

<ol class="breadcrumb" style="margin-top: 50px;">
    <li><a href="admin.php">Admin CP</a></li>
    <li class="active">User List</li>
</ol>

<h1 class="page-header">Students
    <div class="pull-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#new-user">
            <span class="glyphicon glyphicon-plus"></span> New Student</a>
        </button>


        <!-- Modal -->
        <form id="new-user-form" action="admin.php" method="post">
            <input type="hidden" name="p" value="16">
            <input type="hidden" name="type" value="1">
            <div class="modal fade" id="new-user" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <input id="uid-u" name="uid" type="text" class="form-control" placeholder="username">
                            <input id="pwd-u" name="pwd" type="password" class="form-control"
                                   placeholder="password, leave it blank to set default 'qwerty'">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="new-u" type="button" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
            $('#new-u').click(function () {
                var dataString = $('#new-user-form').serialize();
                $.ajax({
                    type: "POST",
                    url: "admin.php",
                    data: dataString,
                    success: function (result) {
                        if (/okkkk/.test(result)) {
                            window.location.href='admin.php?p=3';
                        } else {
                            alert(result);
                            $('#uid-u').focus().select();
                        }
                    },
                    error: function (xhr) {
                        alert("An error occured: " + xhr.status + " " + xhr.statusText);
                    }
                });
            });
            $('#new-user').on('shown.bs.modal', function () {
                $('#uid-u').focus();
            })
        </script>
    </div>
</h1>
<div class="table-responsiv">
    <table class="datatable-1 table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($arr as $key=>$s){ ?>
        <tr>
            <td><?=$key+1?></td>
            <td><?=$s->getUsername()?></td>
            <td><?=$s->getTypeString()?></td>
            <td>
                <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>

    $('.datatable-1').dataTable({

    });
</script>