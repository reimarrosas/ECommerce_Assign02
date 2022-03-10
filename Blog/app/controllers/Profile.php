<?php
class Profile extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->view('Profile/profile');
    }
}