<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>Public Profile</title>
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
                        <button type="submit" class="btn btn-success" id="home" name="home"  value="home">Home</button>
                        <button type="submit" class="btn btn-info" id="profile" name="profile"  value="profile">Profile</button>
                        <button type="submit" id="followers" name="followers"  value="followers" class="btn btn-info">Follower</button>
                        <button type="submit" id="following" name="following" value="following" class="btn btn-info">Following</button>                       
                        <button type="submit"id="logout" name="logout" value="logout" class="btn btn-danger">LogOut</button>
                    </div>
                </form> 

                <form class="searchOption" action ="/servercwk2016208-2/index.php/LoginController/searchByGernre" method="POST">
                    <div class="p-3 bg-info  shadow-sm">
                        <div class="input-group">
                            <input id="GenreSearch" name="GenreSearch" type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                            <div class="input-group-append">
                                <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>         
                </form>
                <div class="media align-items-end profile-header">

                    <?php
                    if (isset($userDetail)) {
                        foreach ($userDetail as $user) {
                            echo '<div class="profile mr-3">';
                            echo '<img name="myimage" src="' . $user->getprofilePic() . '"class="profile-image rounded mb-4 img-fluid img-thumbnail" alt="profile picture" />';
                            echo '</div>';
                            echo '<div class = "media-body mb-5 text-white">';
                            echo '<h3 class = "mt-0 mb-0">' . $user->getfirstName() . '   ' . $user->getlastName() . '</h3>';
                            echo '<p class = "small mb-4"><i class = "fa fa-music mr-2"></i>' . $user->getgenres() . '</p>';
                            if (strpos($friend,$user->getuserName())!==false) {
                                echo '<p class = "small mb-4">' . 'FRIEND' . '</p>';
                            }
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    ?> 
                    <!--user post class-->
                    <div class="py-4 px-4 bg-info">
                        <div class="py-4">
                            <?php
                            $diplayImage = '/(?<=\>)(https?:\/\/.*\.(?:png|jpeg|jpg|gif))(?=<)/';
                            if (count($userpost) != 0) {
                                echo'<h5 class="mb-3">Recent posts</h5>';
                                if (isset($userpost)) {
                                    foreach ($userpost as $status) {
                                        echo '<div class="shadow">';
                                        echo '<div class = "p-4 bg-light rounded shadow-sm border border-primary">';
                                        echo' <p class = "font-italic mb-0">' . preg_replace($diplayImage, "<br><img class ='img-fluid col-md-1 px-0'src='\\0'><br>", auto_link($status->message)) . '</p>';
                                        echo'<ul class = "list-inline small text-muted mt-3 mb-0">';
                                        echo'<li class = "list-inline-item"><i class = "fas fa-pen-fancy aria-hidden="true" mr-2"></i>' . $status->username . ' ' . date_format(date_create($status->time), 'd/m/Y G:ia') . ' </li> ';
                                        echo'</ul>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</br>';
                                    }
                                }
                            } else {
                                echo'<h5 class="col-md-12">No posts</h5>';
                            }
                            ?>
                        </div>
                    </div>
                </div><!-- End profile -->
                </body>
                </html>