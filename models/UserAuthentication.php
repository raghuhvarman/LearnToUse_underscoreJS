<?php

include 'User.php';

class UserAuthentication extends CI_Model {

    function checkUserName($userName) {
        $response = $this->db->get('userdata');


        foreach ($response->result() as $row) {

            if ($row->userName == $userName) {
                return false;
            }
        }
        return true;
    }

    function registerUser($registerInfo) {
        $this->db->insert('userdata', $registerInfo);
    }

    function userLogin($userName, $password) {
        $response = $this->db->get('userdata');
        $loginStatus = 'test';
        foreach ($response->result() as $row) {

            if ($row->userName == $userName) {
                $passwordStatus = password_verify($password, $row->password);                
                if ($passwordStatus == 1) {
                    //setting the essential data to the session
                    $this->session->firstName = $row->firstName;
                    $this->session->lastName = $row->lastName;
                    $this->session->genre = $row->genres;
                    $this->session->profilePic = $row->profilePic;
                    return $passwordStatus;
                }
            }
        }
        return 0;
    }

    function sendUserDetails($username, $loggedInFlag) {
        $userdata = $this->db->get('userdata');
        $this->db->where('userName', $username);

        $UserFound = array();
        if ($username != null & $loggedInFlag = true) {
            foreach ($userdata->result() as $row) {
                if ($row->userName == $username) {
                    $UserFound[] = new User($row->userName, $row->firstName, $row->lastName, $row->genres, $row->profilePic);
                    return $UserFound;
                }
            }
        }
    }

//should remove the password
    function searchUserResults($searchGenre) {
        $userdata = $this->db->get('userdata');
        $UserFound = array();
        $currentUser = $this->session->userdata('username');
        if ($searchGenre != null) {
            foreach ($userdata->result() as $row) {
                if ($row->genres == $searchGenre && $row->userName != $currentUser) {
                    $UserFound[] = new User($row->userName, $row->firstName, $row->lastName, $row->genres, $row->profilePic);
                }
            }
            return $UserFound;
        }
    }

    function checkFollowing() {
        $currentUser = $this->session->userdata('username');
        $userdata = $this->db->get('userdata');
        $this->db->where('userName', $currentUser);
        $currentFollowings = null;

        foreach ($userdata->result() as $row) {
            if ($row->userName == $currentUser) {
                $currentFollowings = $row->following;
                //returning the following users as a array
                $singleFollowing = explode(";", $currentFollowings);
                return $singleFollowing;
            }
        }
    }

    function addFollwing($personToFollow) {
        $currentUser = $this->session->userdata('username');
        $userdata = $this->db->get('userdata');
        $this->db->where('userName', $currentUser);
        $currentFollowings = null;


        if ($personToFollow != null) {
            foreach ($userdata->result() as $row) {
                //adding the following count to the current user
                if ($row->userName === $currentUser and strpos($row->following, $personToFollow) != true) {
                    $currentFollowings = $row->following . ';' . $personToFollow;
                    $this->db->set('following', $currentFollowings);
                    $this->db->update('userdata');
                    //returning the following users as a array
                    $singleFollowing = explode(";", $currentFollowings);
                    return $singleFollowing;
                }
            }
        }
    }

    function updateFollower($Follower) {
        $currentUser = $this->session->userdata('username');
        $userdata = $this->db->get('userdata');
        $this->db->where('userName', $Follower);
        $currentFollowers = null;

        if ($Follower != null) {
            foreach ($userdata->result() as $row) {
                //adding the current user as the follower to the followed user
                if ($row->userName == $Follower and strpos($row->followers, $currentUser) != true) {
                    $currentFollowers = $row->followers . ';' . $currentUser;
                    $this->db->set('followers', $currentFollowers);
                    $this->db->update('userdata');
                }
            }
        }
    }

    function unfollow($Following) {
        $logedinUser = $this->session->userdata('username');
        $userdata = $this->db->get('userdata');

        $currentFollowings = null;
        $newfollowersList = null;

        if ($Following != null) {
            foreach ($userdata->result() as $row) {
                if ($row->userName == $logedinUser and strpos($row->following, $Following) == true) {
                    $unfollowList = explode(";", $row->following);
                    //removing from the following list
                    if (($key = array_search($Following, $unfollowList)) != false) {
                        unset($unfollowList[$key]);
                        $currentFollowings = implode(";", $unfollowList);
                        $this->db->set('following', $currentFollowings);
                        $this->db->where('userName', $logedinUser);
                        $this->db->update('userdata');
                    }
                }
                //removing from followers list
                if ($row->userName == $Following and strpos($row->followers, $logedinUser) == true) {
                    $followers = explode(";", $row->followers);
                    //removing from the following list
                    if (($key = array_search($logedinUser, $followers)) != false) {
                        unset($followers[$key]);
                        $newfollowersList = implode(";", $followers);
                        $this->db->set('followers', $newfollowersList);
                        $this->db->where('userName', $Following);
                        $this->db->update('userdata');
                    }
                }
            }
            return $unfollowList;
        }
    }

    function addUserStatus($userstatus) {
        $this->db->insert('userpost', $userstatus);
    }

    function homePageUserStatus($username) {
        $ListOfFollowing = null;
        //to get the followings
        $following = $this->db->get('userdata');
        $ListOfFollowingArray = array();
        foreach ($following->result() as $row) {
            if ($row->userName == $username) {
                $ListOfFollowing = $row->following;
                $ListOfFollowingArray = explode(";", $ListOfFollowing);
            }
        }
        array_push($ListOfFollowingArray, $username);
        return $ListOfFollowingArray;
    }

    function searchStatus($ListOfFollowingArray) {
        $arrayOfStatus = array();
        $this->db->order_by('time', 'DESC');
        $userpost = $this->db->get('userpost');

        foreach ($userpost->result() as $row) {
            if (in_array($row->username, $ListOfFollowingArray)) {
                $arrayOfStatus[] = $row;
            }                             
        }
        return $arrayOfStatus;
    }

    function showFollowing() {
        $UserFound[] = array();
        $currentUser = $this->session->userdata('username');

        $userdata = $this->db->get('userdata');
        foreach ($userdata->result() as $row) {
            if ($row->userName == $currentUser) {
                $followingUsers = explode(";", $row->following);
            }
        }
        foreach ($userdata->result() as $row) {
            if (in_array($row->userName, $followingUsers)) {
                $UserFound[] = new User($row->userName, $row->firstName, $row->lastName, $row->genres, $row->profilePic);
            }
        }
        return $UserFound;
    }

    function showFollowers() {
        $UserFound[] = array();
        $currentUser = $this->session->userdata('username');

        $userdata = $this->db->get('userdata');
        foreach ($userdata->result() as $row) {
            if ($row->userName == $currentUser) {
                $followerUsers = explode(";", $row->followers);
            }
        }
        foreach ($userdata->result() as $row) {
            if (in_array($row->userName, $followerUsers)) {
                $UserFound[] = new User($row->userName, $row->firstName, $row->lastName, $row->genres, $row->profilePic);
            }
        }

        return $UserFound;
    }

    function publicPageUserStatus($publicUserName) {
        $this->db->order_by('time', 'DESC');
        $userpost = $this->db->get('userpost');
        $userPostArray = array();


        if ($publicUserName != null) {
            foreach ($userpost->result() as $row) {
                if ($row->username == $publicUserName) {
                    $userPostArray[] = $row;
                }
            }
        }
        return $userPostArray;
    }

    function publicProfileDetails($publicUserName) {
        $userdata = $this->db->get('userdata');
        $UserFound = array();
        if ($publicUserName != null) {
            foreach ($userdata->result() as $row) {
                if ($row->userName == $publicUserName) {
                    $UserFound[] = new User($row->userName, $row->firstName, $row->lastName, $row->genres, $row->profilePic);
                    return $UserFound;
                }
            }
        }
    }

    function findFriends($publicUser) {
        $currentUser = $this->session->userdata('username');
        $userdata = $this->db->get('userdata');
        $friendsString = null;
        $insertFriends = null;
        foreach ($userdata->result() as $row) {

            if ($row->userName == $currentUser) {
                $following = explode(";", $row->following);
                $followers = explode(";", $row->followers);
                break;
            }
        }
        $friendsArray = array_intersect($following, $followers);
        for ($index = 0; $index < count($friendsArray); $index++) {
            if (!empty($friendsArray[$index])) {
                $friendsString = $friendsString . ',' . $friendsArray[$index];
            }
        }

        $insertFriends = ltrim($friendsString, ',');
        return $insertFriends;
    }

}
