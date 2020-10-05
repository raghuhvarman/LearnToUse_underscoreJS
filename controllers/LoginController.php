<?php

class LoginController extends CI_Controller {

    public function signUp() {
        $username = $this->session->userdata('username');
        if ($username == null) {
            $this->load->view('SignUpView');
        } else {
            $this->userProfile();
        }
    }

    public function Index() {
        $loggedInFlag = $this->session->userdata('loggedIn');
        if ($loggedInFlag == false) {
            $this->load->view('LoginUser');
        } else {
            $this->userProfile();
        }
    }

    public function userSignup() {
        $username = $this->session->userdata('username');
        if ($username == null) {
            $username = $this->input->post('userName');
            $password = $this->input->post('password');
            $hasedPassword = password_hash($password, PASSWORD_DEFAULT);

            //should assign if only the username gets into the database
            $this->load->model('UserAuthentication', 'userAuth');
            $validUsername = $this->userAuth->checkUserName($username);

            //have to find a way to display on the view
            if ($validUsername) {
                $this->session->username = $username;
                $this->session->password = $hasedPassword;
                //  $this->session->loggedIn = true;
                if ($this->session->userdata('username') != NULL & $this->session->userdata('password') != NULL) {
                    $this->load->view('EnterUserData');
                }
            } else {
                $userNotValid['verifyUser'] = array(
                    'username' => $username
                );
                $this->load->view('SignUpView', $userNotValid);
            }
        } else {
            $this->userProfile();
        }
    }

    public function createProfile() {
        $loggedInFlag = $this->session->userdata('loggedIn');
        $firstStepuserName = $this->session->userdata('username');

        //method works only if the user in not logged in but should have  finished the previous step
        if ($loggedInFlag == false & $firstStepuserName != null) {
            $firstname = $this->input->post('firstName');
            $lastName = $this->input->post('lastName');
            $genre = $this->input->post('genre');
            $profilePic = $this->input->post('profilePic');

            $registrationData = array(
                'userName' => $this->session->userdata('username'),
                'password' => $this->session->userdata('password'),
                'firstName' => $firstname,
                'lastName' => $lastName,
                'genres' => $genre,
                'profilePic' => $profilePic
            );

            //storing the essential data in the session
            $this->session->firstName = $firstname;
            $this->session->lastName = $lastName;
            $this->session->genre = $genre;
            $this->session->profilePic = $profilePic;

            $this->load->model('UserAuthentication', 'userAuth');
            //registering the new user to the database
            $this->userAuth->registerUser($registrationData);
        }
        //load the user profile
        //setting the logged in flag
        $this->session->loggedIn = true;
        $this->userProfile();
    }

    public function userLogin() {
        $username = $this->session->userdata('username');
        $loggedInFlag = $this->session->userdata('loggedIn');
        if ($username == null and $loggedInFlag == false) {
            $username = $this->input->post('userName');
            $password = $this->input->post('password');
            $this->load->model('UserAuthentication', 'login');
            //registering the new user to the database
            $userInfo = $this->login->userLogin($username, $password);
            if ($userInfo == false) {

                $loginNotValid = array(
                    'error' => 'Invalid Login Credentials'
                );
                $this->load->view('LoginUser', $loginNotValid);
            } else {
                $this->session->username = $username;
                $this->session->loggedIn = true;
                $this->userProfile();
            }
        } else {
            $this->userProfile();
        }
    }

    function userProfile() {

        $loggedInUser = $this->session->userdata('username');
        $loggedInFlag = $this->session->userdata('loggedIn');
        //basic user details
        $this->load->model('UserAuthentication', 'retainUserDetails');
        $userInfo = $this->retainUserDetails->sendUserDetails($loggedInUser, $loggedInFlag);
        //user status messages

        $userlist = $this->retainUserDetails->homePageUserStatus($loggedInUser);
        $userstatus = $this->retainUserDetails->searchStatus($userlist);

        $userCharacter = array(
            'userDetail' => $userInfo,
            'userStatus' => $userstatus
        );

        if ($loggedInUser != null & $loggedInFlag = true) {
            $this->load->view('Profile', $userCharacter);
        } else {
            $this->Index();
        }
    }

    function logOutUser() {
        $this->session->sess_destroy();
        $this->load->view('LoginUser');
    }

    function searchByGernre() {
        $username = $this->session->userdata('username');
        if ($username != null) {
            $searchVal = $this->input->post('GenreSearch');
            $this->session->search = $searchVal;
            $this->load->model('UserAuthentication', 'retainSearchDetails');
            $searchUserInfo = $this->retainSearchDetails->searchUserResults($searchVal);
            //finding  the already followed people//
            $followedUsers = $this->retainSearchDetails->checkFollowing();

            $usersDetail = array(
                'searchResults' => $searchUserInfo,
                'followedUsers' => $followedUsers
            );
            $this->load->view('SearchResults', $usersDetail);
        } else {
            $this->Index();
        }
    }

    function followUser() {
        $username = $this->session->userdata('username');

        if ($username != null) {
            $followingUsername = $this->input->post('username');
            $unfollowFlag = $this->input->post('unfollow');
            $searchVal = $this->session->userdata('search');

            if ($unfollowFlag != 'unfollow') {
                //followed user will be added to the database
                $this->load->model('UserAuthentication', 'followPeople');
                $followingArray = $this->followPeople->addFollwing($followingUsername);
                //updating the followers column
                $this->followPeople->updateFollower($followingUsername);
            }

            if ($unfollowFlag == 'unfollow') {
                $this->load->model('UserAuthentication', 'unfollowPeople');
                $followingArray = $this->unfollowPeople->unfollow($followingUsername);
            }

            //same as searchByGernre
            $this->load->model('UserAuthentication', 'retainSearchDetails');
            $searchUserInfo = $this->retainSearchDetails->searchUserResults($searchVal);

            $usersDetail = array(
                'searchResults' => $searchUserInfo,
                'userAdded' => $followingArray
            );
            $this->load->view('SearchResults', $usersDetail);
        } else {
            $this->Index();
        }
    }

    function postStatus() {
        $currentUser = $this->session->userdata('username');
        $statusMsg = $this->input->post('userStatus');

        if ($currentUser != null) {
            if ($statusMsg != null) {
                $statusDetails = array(
                    'username' => $currentUser,
                    'message' => $statusMsg,
                    'time' => date("Y-m-d H:i:s")
                );
                $this->load->model('UserAuthentication', 'addStatusMsg');
                $this->addStatusMsg->addUserStatus($statusDetails);
                $this->userProfile();
            }
        } else {
            $this->Index();
        }
    }

    function followingFollowers() {
        $username = $this->session->userdata('username');

        if ($username != null) {
            $choicefollowing = $this->input->post('following');
            $choicefollowers = $this->input->post('followers');
            $choiceLogout = $this->input->post('logout');
            $choiceHome = $this->input->post('home');
            $choiceProfile = $this->input->post('profile');
            $this->load->model('UserAuthentication', 'followerfollowing');

            if ($choicefollowing == 'following') {
                //go to a model which returns the list of people who you follow 
                $followings = $this->followerfollowing->showFollowing();
                $friendList = $this->followerfollowing->findFriends($username);
                $followingUsers = array(
                    'followings' => $followings,
                    'friendList' => $friendList
                );
                $this->load->view('following', $followingUsers);
            }
            if ($choicefollowers == 'followers') {
                //go to a model which returns the list of people who follows you        
                $followers = $this->followerfollowing->showFollowers();
                $followingUsers = array(
                    'followers' => $followers
                );
                $this->load->view('followers', $followingUsers);
            }
            if ($choiceLogout == 'logout') {
                $this->logOutUser();
            }
            if ($choiceHome == 'home') {
                $this->userProfile();
            }
            if ($choiceProfile == 'profile') {
//                redirect('LoginController/loadPublicProfile?username='.$username);
                $this->load->model('UserAuthentication', 'loadpublicPost');
            	$publicPost = $this->loadpublicPost->publicPageUserStatus($username);
            	$publicProfile = $this->loadpublicPost->publicProfileDetails($username);
            	$friend = $this->loadpublicPost->findFriends($username);

            	$ProfileArray = array(
                	'userpost' => $publicPost,
                	'userDetail' => $publicProfile,
                	'friend' => $friend
            	);
           	 $this->load->view('PublicProfile', $ProfileArray);

            }
        } else {
            $this->Index();
        }
    }

    function loadPublicProfile() {
        $username = $this->session->userdata('username');

        if ($username != null) {
            $username = $this->input->get('username');
            $this->load->model('UserAuthentication', 'loadpublicPost');
            $publicPost = $this->loadpublicPost->publicPageUserStatus($username);
            $publicProfile = $this->loadpublicPost->publicProfileDetails($username);
            $friend = $this->loadpublicPost->findFriends($username);

            $ProfileArray = array(
                'userpost' => $publicPost,
                'userDetail' => $publicProfile,
                'friend' => $friend
            );
            $this->load->view('PublicProfile', $ProfileArray);
        } else {
            $this->Index();
        }
    }

}
