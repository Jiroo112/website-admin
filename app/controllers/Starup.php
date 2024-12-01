<?php

class starup extends Controller{
    
    public function index(){
        $data['css'] = 'starup.css';
        $this->view('templates/headerdefault', $data);
        $this->view('startup/index', $data);
        $this->view('templates/footerlogin', $data);
    }
}