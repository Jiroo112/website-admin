<?php

class Home extends Controller {
    public function index() {
        $data['nama'] = $_SESSION['nama'];
        $data['menu'] = $this->model('DashboardModel')->getTotalMenu();
        $data['pengguna'] = $this->model('DashboardModel')->getTotalPengguna();
        $data['artikel'] = $this->model('DashboardModel')->getTotalArtikel();
        $data['olahraga'] = $this->model('DashboardModel')->getTotalOlahraga();
        $data['konsultan'] = $this->model('DashboardModel')->getTotalKonsultan();
        $data['articles'] = $this->model('DashboardModel')->getAllArticles();   
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }
}
