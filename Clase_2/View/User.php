<?php
    require_once('../Controller/User.php');

    require_once('../conexion/config.php');

    $User= new User();

    $user=$User->ShowUsers();


    if($_SERVER["REQUEEST_METHOD"=="POST"]){
        if($_POST['action']==='create'){
            
        }else if($_POST['action']==='update'){

        }
    }
     
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css"> <title>Users</title>
</head>
<body>
    <table class="table" id="table">
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $key => $value): ?>
                <tr>
                    <td><?= $value->idUser ?></td>
                    <td><?= $value->name ?></td>
                    <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_<?=$value->idUser?>">
                        <?= $value->email ?>
                    </button>
                   
                    
                    </td>
                </tr>

                       <!-- Modal -->
            <div class="modal fade" id="exampleModal_<?=$value->idUser?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                    <div class="form-group">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="email" value="<?= $value->name?>" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" value="<?= $value->email?>" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <hr>
                  
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
            <?php endforeach ?>
        </tbody>
    </table>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
            
        } );
    </script>
</body>

</html>