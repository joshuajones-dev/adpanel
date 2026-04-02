<?php

class Dashboard extends Controller
{
    public function index()
    {
        $model = $this->model('DashboardModel');
        $data = $model->getStats();
        $data['page_title'] = 'Dashboard';
        $data['page'] = 'dash';

        $this->render('dashboard', $data);
    }
}
