<?php

class Landingpage extends Controller
{
    public function index()
    {
        $data['js'] = 'landing.js';
        $data['user'] = $this->model('Landing_model')->getAllContent();
        $data['fitur'] = $this->model('Landing_model')->getAllFitur();
        $this->view('templates/header', $data);
        $this->view('landing/index', $data);
        $this->view('templates/footer', $data);
    }

    public function updateHero()
    {
        $data = array_merge($_POST, $_FILES);
        try {
            if ($this->model('Landing_model')->updateDataHero(($data))) {
                Flasher::setFlash('Landing', 'berhasil diupdate', 'success');
                header('Location: ' . BASEURL . 'Landingpage');
                exit;
            }
        } catch (PDOException $e) {
            Flasher::setFlash('Menu', $e, 'error');
            header('Location: ' . BASEURL . 'Landingpage');
            exit;
        }
    }

    public function getHeroData()
    {
        echo json_encode($this->model('Landing_model')->getAllContent());
    }

    public function updateAbout()
    {
        $data = array_merge($_POST, $_FILES);
        try {
            if ($this->model('Landing_model')->updateDataAbout(($data))) {
                Flasher::setFlash('Landing', 'berhasil diupdate', 'success');
                header('Location: ' . BASEURL . 'Landingpage');
                exit;
            }
        } catch (PDOException $e) {
            Flasher::setFlash('Menu', $e, 'error');
            header('Location: ' . BASEURL . 'Landingpage');
            exit;
        }
    }

    public function getFitur()
    {
        echo json_encode($this->model('Landing_model')->getAllFitur());
    }

    public function updatefitur()
    {
        $data = array_merge($_POST, $_FILES);

        try {
            if ($this->model('Landing_model')->updateFitur(($data))) {
                Flasher::setFlash('Landing', 'berhasil diupdate', 'success');
                header('Location: ' . BASEURL . 'Landingpage');
                exit;
            }
        } catch (PDOException $e) {
            Flasher::setFlash('Menu', $e, 'error');
            header('Location: ' . BASEURL . 'Landingpage');
            exit;
        }
    }
}
