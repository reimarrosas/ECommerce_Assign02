<?php
class Publication extends Controller
{
    public function __construct()
    {
        $this->loginModel = $this->model('loginModel');
        $this->profileModel = $this->model('profileModel');
        $this->publicationModel = $this->model('publicationModel');
        $this->commentModel = $this->model('commentModel');
    }

    public function index($publication_id)
    {

        $publication = $this->publicationModel->getPublication($publication_id);
        $profile = $this->profileModel->getProfile($publication->profile_id);
        $data = [
            'profile' => $profile,
            'publication' => $publication
        ];

        if ($publication == null) { // if post does not exist, go to home page
            $this->view('Home/home');
        } else {
            $profile = isLoggedIn() ? $this->profileModel->getMyProfile($_SESSION) : false;
            $data['profile_id'] = $profile ? $profile->profile_id : -1;
            $data['comments'] = $this->commentModel->getAllComments($publication->publication_id);
            $this->view('Publication/publication', $data);
        }
    }

    public function createPublication()
    {
        if (!isset($_POST['confirm'])) {
            $this->view('Publication/createPublication');
        } else {
            date_default_timezone_set("America/New_York");
            $data = [
                'publication_title' => $_POST['publication_title'],
                'publication_text' => $_POST['publication_text'],
                'publication_status' => '',
                // 'timestamp'=>  date('F d, Y h:i A'),
                'publication_title_error' => '',
                'publication_text_error' => '',
                'publication_text_len_error' => ''
            ];

            if (isset($_POST['private_check'])) {
                $data['publication_status'] = 'private';
            } else {
                $data['publication_status'] = 'public';
            }

            if ($this->validateData($data, "create")) {
                $profile = $this->profileModel->getMyProfile($_SESSION);

                if ($this->publicationModel->createPublication($data, $profile)) {
                    echo 'Please wait creating the publication for you!';
                    echo '<meta http-equiv="Refresh" content="2; url=/ECommerce_Assign02/Blog/Profile/myProfile">';
                }
            }
        }
    }

    public function updatePublication($publication_id)
    {
        $publication = $this->publicationModel->getPublication($publication_id);
        $data = [
            'publication_id' => $publication_id,
            'publication_title' => $publication->publication_title,
            'publication_text' => $publication->publication_text,
            'publication_status' => $publication->publication_status,
            // 'timestamp'=>  date('F d, Y h:i A'),
            'publication_title_error' => '',
            'publication_text_error' => '',
            'publication_text_len_error' => ''
        ];

        if (!isset($_POST['confirm'])) {
            $this->view('Publication/updatePublication', $data);
        } else {
            date_default_timezone_set("America/New_York");
            $data = [
                'publication_id' => $publication_id,
                'publication_title' => $_POST['publication_title'],
                'publication_text' => $_POST['publication_text'],
                'publication_status' => '',
                // 'timestamp'=>  date('F d, Y h:i A'),
                'publication_title_error' => '',
                'publication_text_error' => '',
                'publication_text_len_error' => ''
            ];

            if (isset($_POST['private_check'])) {
                $data['publication_status'] = 'private';
            } else {
                $data['publication_status'] = 'public';
            }

            if ($this->validateData($data, "update")) {
                // $profile = $this->profileModel->getProfile($_SESSION);

                if ($this->publicationModel->updatePublication($data)) {
                    echo 'Please wait updating the publication for you!';
                    echo '<meta http-equiv="Refresh" content="2; url=/ECommerce_Assign02/Blog/Publication/' . $data['publication_id'] . '">';
                }
            }
        }
    }

    public function validateData($data, $method)
    {
        if (empty($data['publication_title'])) {
            $data['publication_title_error'] = 'Please enter a title.';
        }
        if (empty($data['publication_text'])) {
            $data['publication_text_error'] = 'Please enter text.';
        }

        if (strlen($data['publication_title']) > 100) {
            $data['publication_title_len_error'] = 'The title cannot be more than 100 characters.';
        }

        if (strlen($data['publication_text']) > 1000) {
            $data['publication_text_len_error'] = 'The text cannot be more than 1000 characters.';
        }


        if (empty($data['publication_title_error']) && empty($data['publication_text_error']) && empty($data['publication_title_len_error']) && empty($data['publication_text_len_error'])) {
            return true;
        } else {
            if ($method == "create") {
                $this->view('Publication/createPublication', $data);
            } else if ($method == "update") {
                $this->view('Publication/updatePublication', $data);
            }
        }
    }

    public function markAsOpposite($publicationId)
    {
        if ($this->isAuthorized()) {
            $profileId = $this->profileModel->getMyProfile($_SESSION)->profile_id;
            $isSucc = $this->publicationModel->markAsOpposite($publicationId, $profileId);

            if ($isSucc) {
                echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '/profile/' . $profileId . '" />';
            } else {
                echo '<h1 class="text-danger">Internal Server Error: Something Broke!</h1>';
                echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '/profile/' . $profileId . '" />';
            }
        }
    }

    public function deletePublication($publicationId)
    {
        if ($this->isAuthorized()) {
            $profileId = $this->profileModel->getMyProfile($_SESSION)->profile_id;
            $isSucc = $this->publicationModel->deletePublication($publicationId, $profileId);

            if ($isSucc) {
                echo 'Publication ' . $publicationId . ' is successfully deleted. Redirecting to your profile';
            } else {
                echo '<h1 class="text-danger">Internal Server Error: Something Broke!</h1>';
            }
            echo '<meta http-equiv="refresh" content="2;url=' . URLROOT . '/profile/' . $profileId . '" />';
        }
    }
}
