<?php
class Publication extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->view('Publication/publication');
    }
}