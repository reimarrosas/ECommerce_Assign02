<?php
class Comment extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->view('Login/createComment');
    }
}