<!DOCTYPE html>
<html>
<head>
	<title>Employees Database</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>


   <?php
class View{
    public function output($results){
        $table ='';
        foreach($results as $result){
            $table = $table."<table><tr><td>".$result."</td></tr>";
        }
        $table = $table."</table>";
        return "
        <div class='container'>
        <h1>Employee Database</h1>
            <form action='' method='POST' class='form-group'>
                <label for='id'>Employee Id:</label>
                <input type='text' name='id' placeholder='Id'>
                <label for='name'>Employee Name:</label>
                <input type='text' name='name' placeholder='Employee Name'>
                <br>
                <input type='submit' name='get' class='btn btn-primary' value='Get Employee'>
                <input type='submit' name='create' class='btn btn-primary' value='Create Employee'>
                <input type='submit' name='update' class='btn btn-primary' value='Update Employee'>
                <input type='submit' name='delete' class='btn btn-danger' value='Delete Employee'>
                <a href='index.php?get_all' class='btn btn-primary' name='get_all'>Get All Employees</a>
            </form>
            <hr>
            ".$table."</div>";
    }
}
?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"> </script>
</body>
</html>
