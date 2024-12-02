<?php

class Konsultan extends Controller{
    public function index(){
        $data['js'] = 'konsultan.js';
        $data['nama'] = $_SESSION['nama'];
        $data['konsultan'] = $this->model('Konsultan_model')->getAllKonsultan();
        $data['id'] = $this->model('Konsultan_model')->getIdKonsultan();
        $this->view('templates/header', $data);
        $this->view('konsultan/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah(){
        $data = array_merge($_POST, $_FILES);

        try{
            if($this->model('Konsultan_model')->tambahDataKonsultan(($data))){
            Flasher::setFlash('Menu', 'berhasil ditambahkan', 'success');
            header('Location: '. BASEURL . 'konsultan');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Menu', 'gagal ditambahkan', 'error');
            header('Location: '. BASEURL . 'konsultan');
            exit;
        }
    }

    public function hapus($id){

        try{
            if($this->model('Konsultan_model')->hapusDataKonsultan(($id))){
            Flasher::setFlash('Data', 'berhasil dihapus', 'success');
            header('Location: '. BASEURL . 'konsultan');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Data', 'gagal dihapus', 'error');
            header('Location: '. BASEURL . 'konsultan');
            exit;
        }
    }

    public function edit(){
        echo json_encode($this->model('Konsultan_model')->getKonsultanByID(($_POST['id'])));
    }
    
    public function ubah(){
        $data = array_merge($_POST, $_FILES);

        try{
            if($this->model('Konsultan_model')->ubahDataKonsultan(($data))){
            Flasher::setFlash('Data', 'berhasil diubah', 'success');
            header('Location: '. BASEURL . 'konsultan');
            exit;
            
        }else{
            Flasher::setFlash('Data', 'berhasil diubah', 'success');
            header('Location: '. BASEURL . 'konsultan');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Data', $e, 'error');
            header('Location: '. BASEURL . 'konsultan');
            exit;
        }
    }

    public function cari(){
        $data['konsultan'] = $this->model('Konsultan_model')->cariAllKonsultan();
        $data['konsultan'] = $this->model('Konsultan_model')->getIdKonsultan();
        $this->view('templates/header', $data);
        $this->view('konsultan/index', $data);
        $this->view('templates/footer', $data);
    }
    
}