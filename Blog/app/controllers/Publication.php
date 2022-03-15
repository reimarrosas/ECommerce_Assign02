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

    public function markAsOpposite($publicationId)
    {
        if ($this->isAuthorized()) {
            $profileId = $_SESSION['profile_id'];
            $isSucc = $this->publicationModel->markAsOpposite($publicationId, $profileId);

            if ($isSucc) {
                echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '/profile/' . $profileId . '" />';
            } else {
                echo '<h1 class="text-danger">Internal Server Error: Something Broke!</h1>';
                echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '/profile/' . $profileId . '" />';
            }
        }
    }
}
