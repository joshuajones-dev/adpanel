<?php

class Home extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Welcome to adpanel';
        $this->view('home', $data);
    }
}
