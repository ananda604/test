
<?php include_once('controller.php'); ?>
<?php
$controller = new Controller();
    if (isset($_POST['get'])) {
        $id = $_POST['id'];
        $controller->get($id);
    }elseif (isset($_POST['create'])) {
        $emp_id = $_POST['id'];
        $name = $_POST['name'];
        $controller->create($emp_id, $name);
    }elseif (isset($_POST['update'])) {
        $emp_id = $_POST['id'];
        $name = $_POST['name'];
        $controller->update($emp_id, $name);
    }elseif (isset($_POST['delete'])) {
        $emp_id = $_POST['id'];
        $controller->delete($emp_id);
    }elseif ($_SERVER['QUERY_STRING'] == 'get_all'){
        $controller->get_all();
    }else{
        $controller->index();
    }
?>
