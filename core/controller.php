<?php

class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function render($view, $data = [])
    {
        $this->view('layout/pagetop', $data);    // meta, CSS
        echo '<body><section class="body">';

        $this->view('layout/header', $data);     // top nav
        echo '<div class="inner-wrapper">';
        $this->view('layout/navigation', $data); // sidebar nav

        echo '<section role="main" class="content-body">';
        $this->view($view, $data);               // your actual view
        echo '</section>';                       // close content-body

        echo '</div>'; // close inner-wrapper
        $this->view('layout/rightpanel', $data); // optional — move the calendar/sidebar stuff here
        echo '</section></body>';

        $this->view('layout/footer', $data);     // JS includes + close html
    }
}
