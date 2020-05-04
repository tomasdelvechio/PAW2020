<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;
use App\Models\Users;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->model = new Users();
    }

    /**
     * Show all users.
     */
    public function index()
    {
        $users = $this->model->get();
        return view('users', compact('users'));
    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {
        $user = [
            'name' => $_POST['name']
        ];
        $this->model->insert($user);
        return redirect('users');
    }
}
