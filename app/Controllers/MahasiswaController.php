<?php
require_once(__DIR__ . 'G:/XAMPP/htdocs/mahasiswa/app/Models/Mahasiswa.php');

class MahasiswaController {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $data = $this->model->getAll();
        include(__DIR__ . '/../view/mahasiswa_list.php');
    }

    public function create() {
        include(__DIR__ . '/../view/mahasiswa_form.php');
    }

    public function store($data) {
        $this->model->insert($data);
        header("Location: index.php");
    }

}
?>