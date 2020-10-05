<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <title>Followers</title>
    </head>
    <style type="text/css">

        .profile-header {
            transform: translateY(5rem);
        }

        body {
            background: #654ea3;
            background: -webkit-linear-gradient(to right, #654ea3, #eaafc8);
            background: linear-gradient(to right, #654ea3, #eaafc8);
            min-height: 100vh;
        }
        .custom-image{

            height: 250px;
            width: 300px;
        }
        .profile-image{
            height: 220px;
            width: 180px;
        }
    </style>

    <body>   

        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">      
            <h2  class="float-left text-justify" id="home" name="home" colour="blue"  value="home">Monkey Music</h2>
            <div class="px-28 pt-0 pb-4 bg-dark">
                <form action="/servercwk2016208-2/index.php/LoginController/followingFollowers" method="POST">
                    <div id="buttonGroup" class=" float-right" role="group" aria-label="First group">
                        <button type="submit" class="btn btn-success" id="home" name="home"  value="home" >Home</button>
                        <button type="submit" class="btn btn-info" id="profile" name="profile"  value="profile">Profile</button>
                        <button type="submit" id="followers" name="followers"  value="followers" class="btn btn-info">Follower</button>
                        <button type="submit" id="following" name="following" value="following" class="btn btn-info">Following</button> 
                        <button type="submit"id="logout" name="logout" value="logout" class="btn btn-danger">LogOut</button>
                    </div>
                </form>
                <form class="searchOption" action ="/servercwk2016208-2/index.php/LoginController/searchByGernre" method="POST">
                    <div class="p-3 bg-info shadow-sm mb-0">
                        <div class="input-group">
                            <input id="GenreSearch" name="GenreSearch" type="search" placeholder="What're you searching for?" aria-describedby="button-addon" class="form-control  border-0 bg-white ">
                            <div class="input-group-append">
                                <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>         
                </form>
                <div class="media align-items-end profile-header">
                    <?php
                    $firstname = $this->session->userdata('firstName');
                    $lastName = $this->session->userdata('lastName');
                    $genre = $this->session->userdata('genre');
                    $profilePic = $this->session->userdata('profilePic');
                    echo '<div class="profile mr-3">';
                    echo '<img name="myimage" src="' . $profilePic . '"class="profile-image rounded mb-4 img-fluid img-thumbnail" alt="profile picture" />';
                    echo '</div>';
                    echo '<div class = "media-body mb-5 text-white">';
                    echo '<h3 class = "mt-0 mb-0">' . $firstname . '   ' . $lastName . '</h3>';
                    echo '<p class = "small mb-4"><i class = "fa fa-music mr-2"></i>' . $genre . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    ?> 
                    <div class="py-4 px-4"></div>
                    <h5 class="mb-2">Followers</h5>
                    <div class="row bg-info">
                        <div class="col-lg-10 mx-auto">
                            <div class = "row py-5 align-center">
                                <?php
                                if (isset($followers)) {
                                    foreach ($followers as $user) {
                                        if (empty($user) != true) {
                                            echo'<div class = "col-lg-3 cnt-block equal-hight">';
                                            echo'<figure class = "rounded px-10 bg-white shadow-sm">';
                                            echo '<img name="myimage" src="' . $user->getprofilePic() . '" class="custom-image img-thumbnail card-img-top img-rounded" alt="profile picture" />';
                                            echo'<figcaption class="p-4 card-img-bottom">';
                                            echo' <h2 class="h5 font-weight-bold mb-2 font-italic">' . $user->getfirstName() . ' </br> ' . $user->getlastName() . '</h2>';
                                            echo'<lable class="mb-0 text-small text-muted font-italic"><i class = "fa fa-music mr-2"></i>' . $user->getgenres() . '</lable>';
                                            echo ' </figcaption>';
                                            echo'</figure>';
                                            echo'</div>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="separator my-3">  </div>
                </div><!-- End profile -->
    </body>
</html>