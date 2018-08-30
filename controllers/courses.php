<?php

namespace App;

class Courses extends MainController
{
    public function php()
    {
        echo 'PHP IS HERE';
    }

    public function index()
    {
        $userModel = new User();
        $users = $userModel->all();

        $data123 = [
            'users' => $users
        ];
        $data123['moredata'] = 'moredata';

        $this->view->render('course_users', $data123);
    }
}
