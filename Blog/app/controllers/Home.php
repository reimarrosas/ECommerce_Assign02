<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->profileModel = $this->model('profileModel');
        $this->publicationModel = $this->model('publicationModel');
    }

    public function index()
    {
        $data = $this->getAllPublications();

        $this->view('Home/home',$data);
    }

    public function getAllPublications(){
        
        $publications = $this->publicationModel->getEveryPublications();
        $data = [
            'publications' => $publications
        ];

        return $data;
    }
}
