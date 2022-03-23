<?php
class Search extends Controller
{
    public function __construct()
    {
        $this->searchModel = $this->model('searchModel');
        $this->publicationModel = $this->model('publicationModel');
    }

    public function index()
    {
        $this->view('Search/search');
    }
    
    public function getResultByTitle(){
        
        if(!empty($_POST['search_text'])){
            if(isset($_POST['search']) && $_POST['search_type'] == "Title"){
                // var_dump($_POST['search_type']);
                $data = [
                    'term' => $_POST['search_text'],
                    'result' => $this->searchModel->getResultByTitle($_POST['search_text'])
                ];
                
                $this->view('Search/search', $data);
            }
    
            else if(isset($_POST['search']) && $_POST['search_type'] == "Content"){
                $data = [
                    'term' => $_POST['search_text'],
                    'result' => $this->searchModel->getResultByContent($_POST['search_text'])
                ];
                
                $this->view('Search/search', $data);
            }
    
            else if ($_POST['search_type'] == "Latest"){
                
                $data = $this->searchModel->getResultByLatest();
                $this->view('Search/search', $data);
            }
        }
        else{
            $publications = $this->publicationModel->getEveryPublications();
            $data = [
                'publications' => $publications
            ];
            $this->view('Home/home',$data);
        }
    }

    public function getResultByLatest(){
        // var_dump("latest");
        $this->view('Search/search');
    }

    public function getResultByContent(){
        // var_dump("content");
        $this->view('Search/search');
    }
}
