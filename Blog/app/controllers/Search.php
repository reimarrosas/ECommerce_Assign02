<?php
class Search extends Controller
{
    public function __construct()
    {
        $this->searchModel = $this->model('searchModel');
    }

    public function index()
    {
        $this->view('Search/search');
    }
    
    public function getResultByTitle(){
        
        if(isset($_POST['search']) && $_POST['search_type'] == "Title"){
            // var_dump($_POST['search_type']);
            $data = $_POST['search_text'];
            $isSucc = $this->searchModel->getResultByTitle($data);
            $this->view('Search/search', $isSucc);
        }

        else if(isset($_POST['search']) && $_POST['search_type'] == "Content"){
            $data = $_POST['search_text'];
            $isSucc = $this->searchModel->getResultByContent($data);
            $this->view('Search/search', $isSucc);
        }

        elseif ($_POST['search_type'] == "Latest"){
            $isSucc = $this->searchModel->getResultByLatest();
            $this->view('Search/search', $isSucc);
        }
    }

    public function getResultByLatest(){
        var_dump("latest");
        $this->view('Search/search');
    }

    public function getResultByContent(){
        var_dump("content");
        $this->view('Search/search');
    }
}
