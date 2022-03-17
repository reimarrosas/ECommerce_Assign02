<?php
class Profile extends Controller
{
    public function __construct()
    {
        $this->profileModel = $this->model('profileModel');
        $this->publicationModel = $this->model('publicationModel');
        
    }

    
    public function index($profile_id)
    {
        $profile = $this->profileModel->getProfile($profile_id);
        
        if($profile == null){
            header('Location: /ECommerce_Assign02/Blog/Home');
        }
        else{
            $publications = $this->publicationModel->getProfilePublications($profile);
            $data = [
                'author' => $profile,
                'profile' => $publications 
            ];
            $this->view('Profile/index',$data);
        }
    }

    public function myProfile(){
        $profile = $this->profileModel->getMyProfile($_SESSION);
        
        if($profile == null){
            
            $this->createProfile();
        }
        else{
            $publications = $this->publicationModel->getProfilePublications($profile);
            $data = [
                'author' => $profile,
                'profile' => $publications 
            ];
            $this->view('Profile/index',$data);
        }
    }

    public function createProfile(){
        if(!isset($_POST['confirm'])){
            $this->view('Profile/createProfile');
        }
        else{
            $data = [
                'first_name' => $_POST['first_name'],
                'middle_name' => $_POST['middle_name'],
                'last_name' => $_POST['last_name'],
                'first_name_error' => '',
                'last_name_error' => ''
            ];
            
            if($this->validateData($data,"create")){
                
                if($this->profileModel->createProfile($data,$_SESSION)){
                    echo 'Please wait creating the profile for you!';
                    echo '<meta http-equiv="Refresh" content="2; url=/ECommerce_Assign02/Blog/Profile/myProfile">';
                }
            }
        }
    }

    public function updateProfile(){
        $profile = $this->profileModel->getMyProfile($_SESSION);
        $data = [
            'author' => $profile
        ];
        if(!isset($_POST['confirm'])){
            $this->view('Profile/updateProfile',$data);
        }
        else{
            $data = [
                'first_name' => $_POST['first_name'],
                'middle_name' => $_POST['middle_name'],
                'last_name' => $_POST['last_name'],
                'first_name_error' => '',
                'last_name_error' => ''
            ];
            
            if($this->validateData($data,"update")){
                
                if($this->profileModel->updateProfile($data,$_SESSION)){
                    echo 'Please wait updating the profile for you!';
                    echo '<meta http-equiv="Refresh" content="2; url=/ECommerce_Assign02/Blog/Profile/myProfile">';
                }
            }
        }
    }

    public function validateData($data,$method){
        if(empty($data['first_name'])){
            $data['first_name_error'] = 'First name cannot be empty';
        }
        if(empty($data['last_name'])){
            $data['last_name_error'] = 'Last name cannot be empty';
        }

        if(empty($data['first_name_error']) && empty($data['last_name_error'])){
            return true;
        }
        else{
            if($method == "create"){
                $this->view('Profile/createProfile',$data);
            }
            else if($method == "update"){
                $this->view('Profile/updateProfile',$data);
            }
        }
    }
}


