<?php

class Olahraga extends Controller{

    public function index() {
        $data['js'] = 'olahraga.js';
        $data['olahraga'] = $this->model('Olahraga_model')->getAllOlahraga();
        $data['id'] = $this->model('Olahraga_model')->getIdOlahraga();
        $this->view('templates/header', $data);
        $this->view('olahraga/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah(){
        $data = array_merge($_POST, $_FILES);

        try{
            if($this->model('Olahraga_model')->tambahDataOlahraga(($data))){
            Flasher::setFlash('Data', 'berhasil ditambahkan', 'success');
            header('Location: '. BASEURL . 'olahraga');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Data', 'gagal ditambahkan', 'error');
            header('Location: '. BASEURL . 'olahraga');
            exit;
        }
    }

    public function hapus($id){

        try{
            if($this->model('Olahraga_model')->hapusDataOlahraga(($id))){
            Flasher::setFlash('Data', 'berhasil dihapus', 'success');
            header('Location: '. BASEURL . 'olahraga');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Data', 'gagal dihapus', 'error');
            header('Location: '. BASEURL . 'olahraga');
            exit;
        }
    }

    public function edit(){
        echo json_encode($this->model('Olahraga_model')->getOlahragaByID(($_POST['id'])));
    }
    
    public function ubah(){
        $data = array_merge($_POST, $_FILES);

        try{
            if($this->model('Olahraga_model')->ubahDataOlahraga(($data))){
            Flasher::setFlash('Menu', 'berhasil diubah', 'success');
            header('Location: '. BASEURL . 'olahraga');
            exit;
            
        }else{
            Flasher::setFlash('Menu', 'berhasil diubah', 'success');
            header('Location: '. BASEURL . 'olahraga');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Menu', $e, 'error');
            header('Location: '. BASEURL . 'olahraga');
            exit;
        }
    }

    public function cari(){
        $data['olahraga'] = $this->model('Olahraga_model')->cariAllOlahraga();
        $data['id'] = $this->model('Olahraga_model')->getIdOlahraga();
        $this->view('templates/header', $data);
        $this->view('olahraga/index', $data);
        $this->view('templates/footer', $data);
    }
}