<?php

class Buku extends Controller{
    public function index(){
        $data['js'] = 'buku.js';
        $data['buku'] = $this->model('Buku_model')->getAllBuku();
        $data['id'] = $this->model('Buku_model')->getIdBuku();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah(){
        $data = array_merge($_POST, $_FILES);

        try{
            if($this->model('Buku_model')->tambahDataBuku(($data))){
            Flasher::setFlash('Buku', 'berhasil ditambahkan', 'success');
            header('Location: '. BASEURL . 'buku');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Buku', 'Gagal dihapus', 'error');
            header('Location: '. BASEURL . 'buku');
            exit;
        }
    }

    public function hapus($id){

        try{
            if($this->model('Buku_model')->hapusDataBuku(($id))){
            Flasher::setFlash('Buku', 'berhasil dihapus', 'success');
            header('Location: '. BASEURL . 'buku');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Buku', 'gagal dihapus', 'error');
            header('Location: '. BASEURL . 'buku');
            exit;
        }
    }

    public function edit(){
        echo json_encode($this->model('Buku_model')->getBukuByID(($_POST['id'])));
    }

    public function ubah(){
        $data = array_merge($_POST, $_FILES);

        try{
            if($this->model('Buku_model')->ubahDataBuku(($data))){
            Flasher::setFlash('Buku', 'berhasil diubah', 'success');
            header('Location: '. BASEURL . 'buku');
            exit;
            
        }else{
            Flasher::setFlash('Buku', 'berhasil diubah', 'success');
            header('Location: '. BASEURL . 'buku');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Buku', $e, 'error');
            header('Location: '. BASEURL . 'buku');
            exit;
        }
    }
    public function cari(){
        $data['js'] = 'buku.js';
        $data['buku'] = $this->model('Buku_model')->cariAllBuku();
        $data['id'] = $this->model('Buku_model')->getIdBuku();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer', $data);
    }

    public function filter(){
        $data['js'] = 'buku.js';
        $data['buku'] = $this->model('Buku_model')->filter();
        $data['id'] = $this->model('Buku_model')->getIdBuku();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer', $data);
    }
}