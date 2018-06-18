<?php
    include_once('view.php');
    include_once('employee.php');
?>
<?php
class Controller {
    private $view;
    public function __construct(){
        $this->view = new View();
    }
    public function get($id){
        $errors = $this->validation($id,'2ndparam');
        if ($errors){
            echo $this->view->output($errors);
        }else{
            $employee = new Employee();
            echo $this->view->output($employee->read($id));
        }
    }
    //validation function to both fields - name and id
    private function validation($id, $name){
        $errors = [];
        if(empty($id)){
            array_push($errors,'id cannot be empty');
        }
        if(empty($name)){
            array_push($errors,'name cannot be empty');
        }
        return $errors;
    }
    public function create($id, $name){
        $errors = $this->validation($id, $name);
        if ($errors){
            echo $this->view->output($errors);
        }else{
            $employee = new Employee();
            echo $this->view->output($employee->create($id, $name));
        }
    }

    public function update($id, $name){
        $errors = $this->validation($id, $name);
        if ($errors){
            echo $this->view->output($errors);
        }else{
            $employee = new Employee();
            echo $this->view->output($employee->update($id, $name));
        }
    }
    public function delete($id){
        $errors = $this->validation($id,'dummy');
        if ($errors){
            echo $this->view->output($errors);
        }else{
            $employee = new Employee();
            echo $this->view->output($employee->delete($id));
        }
    }
    public function get_all(){
        $employee = new Employee();
        echo $this->view->output($employee->show_all());
    }
    public function index(){
        echo $this->view->output([]);
    }
}
?>
