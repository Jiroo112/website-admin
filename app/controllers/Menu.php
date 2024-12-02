<?php 

class Menu extends Controller{

    public function index() {
        $data['nama'] = $_SESSION['nama'];
        $data['js'] = 'menu.js';
        $data['menu'] = $this->model('Menu_model')->getAllMenu();
        $data['id'] = $this->model('Menu_model')->getIdMenu();
        $this->view('templates/header', $data);
        $this->view('menu/index', $data);
        $this->view('templates/footer', $data);
    }

    public function addMenu(){
        $this->view('templates/header');
        $this->view('menu/addMenu');
        $this->view('templates/footer');
    }

    public function tambah(){
        $data = array_merge($_POST, $_FILES);

        try{
            if($this->model('Menu_model')->tambahDataMenu(($data))){
            Flasher::setFlash('Menu', 'berhasil ditambahkan', 'success');
            header('Location: '. BASEURL . 'menu');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Menu', $e , 'error');
            header('Location: '. BASEURL . 'menu');
            exit;
        }
    }

    public function hapus($id){

        try{
            if($this->model('Menu_model')->hapusDataMenu(($id))){
            Flasher::setFlash('Menu', 'berhasil dihapus', 'success');
            header('Location: '. BASEURL . 'menu');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Menu', 'gagal dihapus', 'error');
            header('Location: '. BASEURL . 'menu');
            exit;
        }
    }

    public function edit(){
        echo json_encode($this->model('Menu_model')->getMenuByID(($_POST['id'])));
    }
    
    public function ubah(){
        $data = array_merge($_POST, $_FILES);

        try{
            if($this->model('Menu_model')->ubahDataMenu(($data))){
            Flasher::setFlash('Menu', 'berhasil diubah', 'success');
            header('Location: '. BASEURL . 'menu');
            exit;
            
        }else{
            Flasher::setFlash('Menu', 'berhasil diubah', 'success');
            header('Location: '. BASEURL . 'menu');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Menu', $e, 'error');
            header('Location: '. BASEURL . 'menu');
            exit;
        }
    }

    public function cari(){
        $data['js'] = 'menu.js';
        $data['menu'] = $this->model('Menu_model')->cariAllMenu();
        $data['id'] = $this->model('Menu_model')->getIdMenu();
        $this->view('templates/header', $data);
        $this->view('menu/index', $data);
        $this->view('templates/footer',$data);
    }

    public function filter(){
        $data['js'] = 'menu.js';
        $data['menu'] = $this->model('Menu_model')->filter();
        $data['id'] = $this->model('Menu_model')->getIdMenu();
        $this->view('templates/header', $data);
        $this->view('menu/index', $data);
        $this->view('templates/footer', $data);
    }
}

?>