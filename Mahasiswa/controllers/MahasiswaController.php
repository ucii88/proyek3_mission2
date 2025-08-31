<?php
require_once __DIR__ . '/../models/MahasiswaModel.php';

class MahasiswaController {
    private $model;

    public function __construct() {
        $this->model = new MahasiswaModel();
    }

    public function index() {
    $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING) ?: '';
    $result = $this->model->getAll($search);
    require_once __DIR__ . '/../views/display_mahasiswa.php';
}

    public function detail() {
        $nim = isset($_GET['nim']) ? $_GET['nim'] : '';
        $row = $this->model->getByNim($nim);
        require_once __DIR__ . '/../views/detail_mahasiswa.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $umur = (int)$_POST['umur'];
            if (!empty($nim) && !empty($nama) && $umur > 0) {
                if ($this->model->create($nim, $nama, $umur)) {
                    header("Location: index.php");
                    exit;
                } else {
                    echo "<p style='color:red;'>Gagal menyimpan data.</p>";
                }
            } else {
                echo "<p style='color:red;'>Data tidak valid!</p>";
            }
        }
        require_once __DIR__ . '/../views/form_input_mahasiswa.php';
    }

    public function edit() {
        $nim = isset($_GET['nim']) ? $_GET['nim'] : '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $umur = (int)$_POST['umur'];
            if (!empty($nim) && !empty($nama) && $umur > 0) {
                if ($this->model->update($nim, $nama, $umur)) {
                    header("Location: index.php");
                    exit;
                } else {
                    echo "<p style='color:red;'>Gagal mengupdate data.</p>";
                }
            } else {
                echo "<p style='color:red;'>Data tidak valid!</p>";
            }
        }
        $row = $this->model->getByNim($nim);
        require_once __DIR__ . '/../views/form_edit.php';
    }

    public function delete() {
        $nim = isset($_GET['nim']) ? $_GET['nim'] : '';
        if ($this->model->delete($nim)) {
            header("Location: index.php");
            exit;
        } else {
            echo "<p style='color:red;'>Gagal menghapus data.</p>";
        }
    }
}
?>