
<?php
define('DB_HOST',   'localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','new');

//connection to the db within class emplyees
class Employee{
    private $connection;
    public function __construct(){
        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }

    //query to get one employee by id

    public function read($id){
        $query = "SELECT * FROM employees WHERE id = '$id' ";
        if($result = mysqli_query($this->connection, $query)){
            $num_of_rows = mysqli_num_rows($result);
            if($num_of_rows == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    return [$row['id']." - ".$row['name']." ".$row['registration_date']];

            }else{
                return ["Employee with id $id does not exist"];
            }
        } else {
            return ['Query Failed!'];
        }

    }
    //query to create employee by filling id and name

    public function create($id, $name){
        $query = "INSERT INTO employees (id, name, registration_date) VALUES ($id, '$name', now()) ";
        if(mysqli_query($this->connection, $query)){
            return ['Created succesfully!'];
        } else {
            return ['Query Failed!'];
        }
    }
    // query for updating employee by id

    public function update($id, $name){
        $query = "UPDATE employees SET name = '$name' WHERE id = $id";
        if(mysqli_query($this->connection, $query)){
            $affected = mysqli_affected_rows($this->connection);
            if ($affected == 1){
                return ["user with id ".$id." updated (name = '$name')"];
            }else{
                return ["user with id ".$id." does not exist"];
            }
        } else {
            return ['Query Failed!'];
        }
    }
    //query to delete user by id

    public function delete($id){
        $query = "DELETE FROM employees WHERE id = $id";
        if(mysqli_query($this->connection, $query)){
            $affected = mysqli_affected_rows($this->connection);
            if ($affected == 1){
                return ["user with id ".$id." deleted succesfully"];
            }else{
                return ["user with id ".$id." does not exist"];
            }
        } else {
            return ['Query Failed!'];
        }
    }

    //query to show all the employees

    public function show_all(){
        $query = "SELECT * FROM employees ";
        if($result = mysqli_query($this->connection, $query)){
            $names = [];
            while($row = mysqli_fetch_array($result))
                array_push($names, $row['id']."  ".$row['name']." ".$row['registration_date']);
            return $names;
        }
    }
}
?>
