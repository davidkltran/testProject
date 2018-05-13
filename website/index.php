<?php

include "action.php";

?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script scr="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script scr="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><meta http-equiv="Content-
Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width-device-width,initial-scale=1.0"/>
<title>Your website</title>
<link rel="stylesheet" href="" type="text/css" />
<script type="text/javascript"></script>
</head>

<body>

    <div class="container">
        <div class="jumbotron">
            <h1>Contact Management <small>IS445</small></h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Enter Contact Details</div>
                    <div class="panel-body">
                        <?php
                            if(isset($_GET["update"])){
                                //php 7
                                $id = $_GET["id"] ?? null;
                                $where = array("id"=>$id,);
                                $row = $obj->select_record("contacts",$where);
                                ?>
                                       <form method="post" action="action.php">
                                            <table class="table table-hover">
                                                <tr>
                                                    <td><input type="hidden" name="id" value="<?php echo $id;  ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td><input type="text" class="form-control" values="<?php echo $row["t_name"]; ?>" name="name" placeholder="Enter New Name"></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><input type="text" class="form-control" name="email" values="<?php echo $row["t_email"]; ?>" placeholder="Enter New Email"></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td><input type="text" class="form-control" name="phone" values="<?php echo $row["t_phone"]; ?>" placeholder="Enter New Phone"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="edit" value="Update"></td>
                                                </tr>
                                            </table>
                                        </form>

                                <?php
                            }else{
                                ?>
                                    <form method="post" action="action.php">
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Name</td>
                                                <td><input type="text" class="form-control" name="name" placeholder="Enter Name"></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><input type="text" class="form-control" name="email" placeholder="Enter Email"></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><input type="text" class="form-control" name="phone" placeholder="Enter Phone"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="submit" value="Store"></td>
                                            </tr>
                                        </table>
                                    </form>
                                
                                <?php
                                }
                        
                        
                        ?>
                        
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
       
    </div>

    <div class="container">
        <div class="row">
            <div class "col-md-2"></div>
            <div class "col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php
                        $myrow = $obj->fetch_record("testdb");
                        foreach ($myrow as $row){
                            //breaking point
                            ?>
                                <tr>
                                    <td><?php echo $row["t_name"]; ?></td>
                                    <td><?php echo $row["t_email"]; ?></td>
                                    <td><b><?php echo $row["t_phone"]; ?></b></td>
                                    <td><a href="index.php?update=1&id=<?php echo $row["id"]; ?>"class="btn btn-info">Edit</a></td>
                                    <td><a href="action.php?delete=1&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                            
                            
                            <?php
                        }
                    ?>
                    
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

</body>
</html>