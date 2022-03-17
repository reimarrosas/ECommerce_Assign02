<?php
class Login extends Controller
{
    public function __construct()
    {
        $this->loginModel = $this->model('loginModel');
    }

    public function index()
    {
        if (!isset($_POST['login'])) {
            $this->view('Login/index');
        } else {
            if (empty($_POST['username'])) {
                $data = [
                    'username_error' => 'Please enter a username.',
                    'password_error' => '',
                    'msg' => ''
                ];
                if(empty($_POST['password'])){
                    $data['password_error'] = 'Please enter a password.';
                }
                $this->view('Login/index', $data);
            } 
            else {
                $author = $this->loginModel->getAuthor($_POST['username']);

                if ($author != null) {
                    $hashed_pass = $author->password_hash;
                    $password = $_POST['password'];

                    $data = [
                        'username_error' => '',
                        'password_error' => '',
                        'msg' => ''
                    ];

                    if (password_verify($password, $hashed_pass)) {
                        $this->createSession($author);
                        echo 'Hello ' . trim($_POST['username']) . ', Please wait logging in ';
                        echo '<meta http-equiv="Refresh" content="2; url=/ECommerce_Assign02/Blog/">';
                        // $this->view('Home/home', $data);
                    } else {
                        $data = [
                            'password_error' => 'Incorrect password entered!',
                        ];
                        $this->view('Login/index', $data);
                    }
                } else {
                    $data = [
                        'username_error' => 'Account with username: ' . $_POST['username'] . ' does not exist.',
                    ];
                    $this->view('Login/index', $data);
                }
            }
        }
    }

    public function register()
    {
        if (!isset($_POST['register'])) {

            $this->view('Login/register');
        } else {
            $author = $this->loginModel->getAuthor($_POST['username']);
            if ($author == null) {
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => $_POST['password'],
                    'password_verify' => $_POST['verify_password'],
                    'password_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'username_error' => '',
                    'password_error' => '',
                    'password_match_error' => '',
                    'password_len_error' => '',
                    'msg' => ''
                ];
                if ($this->validateData($data)) {
                    if ($this->loginModel->createAuthor($data)) {
                        // $this->createSession($author);
                        echo 'Please wait creating the account for ' . trim($_POST['username']);
                        echo '<meta http-equiv="Refresh" content="2; url=/ECommerce_Assign02/Blog/">';
                    }
                }
            } else {
                $data = [
                    'username_error' => "Author: " . $_POST['username'] . " already exists",
                ];
                $this->view('Login/register', $data);
            }
        }
    }

    public function validateData($data)
    {
        if (empty($data['username'])) {
            $data['username_error'] = 'Username cannot be empty.';
        }

        if (strlen($data['password']) < 6) {
            $data['password_len_error'] = 'Password cannot be less than 6 characters.';
        }
        if ($data['password'] != $data['password_verify']) {
            $data['password_match_error'] = 'Password does not match.';
        }

        if (empty($data['username_error']) && empty($data['password_error']) && empty($data['password_len_error']) && empty($data['password_match_error'])) {
            return true;
        } else {
            $this->view('Login/register', $data);
        }
    }

    public function createSession($author)
    {
        $_SESSION['author_id'] = $author->author_id;
        $_SESSION['author_username'] = $author->username;
    }

    public function logout()
    {
        unset($_SESSION['author_id']);
        session_destroy();
        echo '<meta http-equiv="Refresh" content="1; url=/ECommerce_Assign02/Blog/">';
    }
}

