<ol class="breadcrumb" style="margin-top: 50px;">
    <li><a href="admin.php">Admin CP</a></li>
    <li class="active">User List</li>
</ol>

<h1 class="page-header">Accounts
    <div class="pull-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#new-user">
            <span class="glyphicon glyphicon-plus"></span> New User</a>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="new-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        hello
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#new-user').on('shown.bs.modal', function () {
                console.log('modal shown');
            })
        </script>
    </div>
</h1>
<div class="table-responsiv">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Type</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>quando</td>
            <td>Admin</td>
            <td>13:30 05/07/15</td>
            <td>
                <a href="#">Reset Password</a> |
                <a href="#">Refresh</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>s3443163</td>
            <td>Student</td>
            <td>13:30 05/07/15</td>
            <td>
                <a href="#">Reset Password</a> |
                <a href="#">Refresh</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>