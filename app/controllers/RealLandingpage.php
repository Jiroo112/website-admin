<?php

class RealLandingpage extends Controller
{
    public function index()
    {
        $data['css'] = 'landingpage.css';
        $this->view('landingpage/index', $data);
    }
}