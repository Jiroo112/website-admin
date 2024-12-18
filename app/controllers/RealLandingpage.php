<?php

class RealLandingpage extends Controller
{
    public function index()
    {
        if (isset($_SESSION['nama']) && !empty($_SESSION['nama'])){
            $data['nama'] = $_SESSION['nama'];
        }
        else{
            $data['nama'] = "";
        }
        $data['css'] = 'landingpage.css';
        $this->view('landingpage/index', $data);
    }
}