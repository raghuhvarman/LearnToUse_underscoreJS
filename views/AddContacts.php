<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>


<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>


        <title>Add Contacts</title>
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
        .btn-colour{
            color: #000000;
            background-color: #0086b3
        }
        .profile-image{
            height: 220px;
            width: 180px;
        }

    </style>
    <style>
        .register{
            position: relative;                
            margin: 5% auto;
            background: #ecf0f1;
            width: 350px;
            border-radius: 5px;
            box-shadow: 3px 3px 10px #129FEA;
            padding: 20px;
        }
        .register body{
            background-image: url('../../images/mic.jpg');
            background-size: 100%;
        }
        .register h3 {
            text-align: center;
            font-weight: 200;
            font-size: 2em;
            margin-top: 10px;
            color: #34495e;
        }
        .register h4 {
            text-align: center;
            font-weight:200;
            font-size: 2.5em;
            margin-top: 10px;
            color: #129FEA;
        }
        .register h1 {
            text-align: center;
            font-weight: 100;
            font-size: 1em;
            margin-top: 20px;
            color: #34495e;
        }
        .register    button {
            background: #e74c3c;
            border:#e74c3c;
            color: white;
            font-size: 18px;
            font-weight: 200;
            cursor: pointer;
            transition: box-shadow .4s ease;
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
            margin-bottom: 25px;
            height: 40px;
            border-radius: 5px;
            outline: 0;
            -moz-outline-style: none;
        }
        .register     input,select
        {
            border: 1px solid #bbb;
            padding: 0 0 0 10px;
            font-size: 14px;   
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
            margin-bottom: 25px;
            height: 40px;
            border-radius: 5px;
            outline: 0;
            -moz-outline-style: none;
        }


        .customimage{

            height: 250px;
            width: 300px;
        }
        .profile-image{
            height: 220px;
            width: 180px;
        }


    </style>

    <body>   
        <!-----------------------------------------------------------start create contact----------------------------------------------------------->  
        <div id="home_content"></div>
        <script type="text/template" id="creatNewContact">
            <div class="bg-white shadow rounded overflow-hidden">     
            <h2  class="float-left text-justify" id="home" name="home" colour="blue"  value="home">Monkey Music</h2>
            <div class="px-28 pt-0 pb-4 bg-dark">
            <div id="buttonGroup" class=" float-right" role="group" aria-label="First group">
            <form action="/servercwk2016208-2/index.php/LoginController/followingFollowers" method="POST">                        
            <button type="submit" class="btn btn-success" id="home" name="home"  value="home">Home</button>
            <button type="submit" class="btn btn-info" id="profile" name="profile"  value="profile">Profile</button>
            <button type="submit" id="followers" name="followers"  value="followers" class="btn btn-info">Follower</button>
            <button type="submit" id="following" name="following" value="following" class="btn btn-info">Following</button> 
            <button type="submit"id="logout" name="logout" value="logout" class="btn btn-danger">LogOut</button>

            </form>
            <button type="button"id="newContact" name="newContact" value="newContact" class="btn btn-danger">New Contacts</button>
            <button  id="ViewContact" class="btn btn-success">View Contact</button>
            </div>

            <div class="p-3 bg-info  shadow-sm">
            <div class="input-group">
            <input id="Search" name="Search" type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
            <div class="input-group-append">
            <button id="searchButton">Search</button>
            </div>
            </div>
            </div>         
            <div class="media align-items-end profile-header">


            <?php
            echo '<div class="profile mr-3">';
            echo '<img name="myimage" src=" https://i.imgur.com/IoZcqgo.jpg " width="180" height="150" class="profile-image rounded mb-4 img-fluid img-thumbnail" alt="profile picture" />';
            echo '</div>';
            echo '<div class = "media-body mb-5 text-white">';
            echo '<h3 class = "mt-0 mb-0">Raghuvarman Jeyakumar</h3>';
            echo '<p class = "small mb-4"><i class = "fa fa-music mr-2"></i>ROCK</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            ?> 

            <div class="py-4 px-4 bg-info">
            <!--user area-->
            <div class="py-4"> 




            <div class="register">
            <h4>Contact Book</h4>
            <h3>Add a contact</h3>                            
            <h1 ><div  id="errorMsg"  name="errorMsg"></div></h1><br/>
            <input type="text" id="firstName" placeholder="Enter Firstname" name="firstName" required="true"><br/>                
            <input type="text" id="lastName"  placeholder="Enter Lastname" name="lastName" required="true"><br/>              
            <input id="contactNo" placeholder="Contact No" name="contactNo" required="true" type="number" maxlength="10"><br/> 
            <input type="email" id="email" placeholder="Email Address" name="email" required="true"><br/>
            <input type="url" id="profilePic" placeholder="Link to Profile Picture" name="profilePic" required="true"><br/> 
            <input type="text" id="tag" placeholder="Add a tag" name="tag" required="true"><br/>                                 
            <button  id="createContact">Create Contact</button><br>       
            </div>

            </div>  

            </div>
            <!--user area-->        
            </div>

            </div><!-- End profile-->

            </div>
            </div>
        </script>
        <!-----------------------------------------------------------end create contact----------------------------------------------------------->    
        <!-----------------------------------------------------------start contacts----------------------------------------------------------->
        <script type="text/template" id="searchResultView">

            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">  
            <h2  class="float-left text-justify" id="home" name="home" colour="blue"  value="home">Monkey Music</h2>
            <div class="px-28 pt-0 pb-4 bg-dark">
            <div id="buttonGroup" class=" float-right" role="group" aria-label="First group">
            <form action="/servercwk2016208-2/index.php/LoginController/followingFollowers" method="POST">            
            <button type="submit" class="btn btn-success" id="home" name="home"  value="home" >Home</button>
            <button type="submit" class="btn btn-info" id="profile" name="profile"  value="profile">Profile</button>
            <button type="submit" id="followers" name="followers"  value="followers" class="btn btn-info">Follower</button>
            <button type="submit" id="following" name="following" value="following" class="btn btn-info">Following</button>
            <button type="submit"id="logout" name="logout" value="logout" class="btn btn-danger">LogOut</button>

            </form> 
            <button type="button"id="newContact" name="newContact" value="newContact" class="btn btn-danger">New Contacts</button>
            <button  id="ViewContact" class="btn btn-success">View Contact</button>
            </div>  
            <div class="p-3 bg-info  shadow-sm mb-0">
            <div class="input-group">
            <input id="Search" name="Search" type="search" placeholder="What're you searching for?" aria-describedby="button-addon" class="form-control  border-0 bg-white ">
            <div class="input-group-append">
            <button id="searchButton"  class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
            </div>
            </div>
            </div>         

            <div class="media align-items-end profile-header">

            <?php
            echo '<div class="profile mr-3">';
            echo '<img name="myimage" src=" https://i.imgur.com/IoZcqgo.jpg " width="180" height="150" class="profile-image rounded mb-4 img-fluid img-thumbnail" alt="profile picture" />';
            echo '</div>';
            echo '<div class = "media-body mb-5 text-white">';
            echo '<h3 class = "mt-0 mb-0">Raghuvarman Jeyakumar</h3>';
            echo '<p class = "small mb-4"><i class = "fa fa-music mr-2"></i>ROCK</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            ?> 

            <div class="py-4 px-4"></div>
            <h5 class="mb-2">Search Results </h5>  
            <div class="row bg-info auto">

            <div class="col-lg-10 mx-auto">


            <div id="search_Content"></div>
            <div class = "row py-5 align-center">


            </div>

            </div>
            </div>
            </div><!-- End profile -->
        </script>
        <!-----------------------------------------------------------end contacts-----------------------------------------------------------> 
        <!-----------------------------------------------------------all contacts-----------------------------------------------------------> 
        <script type="text/template" id="allView">
            <div class="bg-white shadow rounded overflow-hidden">     
            <h2  class="float-left text-justify" id="home" name="home" colour="blue"  value="home">Monkey Music</h2>
            <div class="px-28 pt-0 pb-4 bg-dark">
            <div id="buttonGroup" class=" float-right" role="group" aria-label="First group">
            <form action="/servercwk2016208-2/index.php/LoginController/followingFollowers" method="POST">                        
            <button type="submit" class="btn btn-success" id="home" name="home"  value="home">Home</button>
            <button type="submit" class="btn btn-info" id="profile" name="profile"  value="profile">Profile</button>
            <button type="submit" id="followers" name="followers"  value="followers" class="btn btn-info">Follower</button>
            <button type="submit" id="following" name="following" value="following" class="btn btn-info">Following</button> 
            <button type="submit"id="logout" name="logout" value="logout" class="btn btn-danger">LogOut</button>

            </form>
            <button type="button"id="newContact" name="newContact" value="newContact" class="btn btn-danger">New Contacts</button>
            <button  id="ViewContact" class="btn btn-success">View Contact</button>
            </div>



            <div class="p-3 bg-info  shadow-sm">
            <div class="input-group">
            <input id="Search" name="Search" type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
            <div class="input-group-append">
            <button id="searchButton">Search</button>
            </div>
            </div>
            </div>         
            <div class="media align-items-end profile-header">


            <?php
            echo '<div class="profile mr-3">';
            echo '<img name="myimage" src=" https://i.imgur.com/IoZcqgo.jpg " width="180" height="150" class="profile-image rounded mb-4 img-fluid img-thumbnail" alt="profile picture" />';
            echo '</div>';
            echo '<div class = "media-body mb-5 text-white">';
            echo '<h3 class = "mt-0 mb-0">Raghuvarman Jeyakumar</h3>';
            echo '<p class = "small mb-4"><i class = "fa fa-music mr-2"></i>ROCK</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            ?> 
            <div class="py-4 px-4 bg-info">
            <!--user area-->
            <div class="py-4"> 
            <div id="myContacts">            
            <div class="py-4 px-4"></div>
            <h5 class="mb-2">Contacts</h5>

            <div class="row bg-info">
            <div class="col-lg-10 mx-auto">

            <div id="showEverything"></div>

            <div class = "row py-5 align-center">


            </div>
            </div>
            </div>
            </div>

            </div>  

            </div>
            <!--user area-->        
            </div>

            </div><!-- End profile-->

            </div>
            </div>

        </script>

        <script type="text/template" id="updateView">
            <div class="bg-white shadow rounded overflow-hidden">     
            <h2  class="float-left text-justify" id="home" name="home" colour="blue"  value="home">Monkey Music</h2>
            <div class="px-28 pt-0 pb-4 bg-dark">
            <div id="buttonGroup" class=" float-right" role="group" aria-label="First group">
            <form action="/servercwk2016208-2/index.php/LoginController/followingFollowers" method="POST">                        
            <button type="submit" class="btn btn-success" id="home" name="home"  value="home">Home</button>
            <button type="submit" class="btn btn-info" id="profile" name="profile"  value="profile">Profile</button>
            <button type="submit" id="followers" name="followers"  value="followers" class="btn btn-info">Follower</button>
            <button type="submit" id="following" name="following" value="following" class="btn btn-info">Following</button> 
            <button type="submit"id="logout" name="logout" value="logout" class="btn btn-danger">LogOut</button>

            </form>
            <button type="button"id="newContact" name="newContact" value="newContact" class="btn btn-danger">New Contacts</button>
            <button  id="ViewContact" class="btn btn-success">View Contact</button>
            </div>

            <div class="p-3 bg-info  shadow-sm">
            <div class="input-group">
            <input id="Search" name="Search" type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
            <div class="input-group-append">
            <button id="searchButton">Search</button>
            </div>
            </div>
            </div>         
            <div class="media align-items-end profile-header">


            <?php
            echo '<div class="profile mr-3">';
            echo '<img name="myimage" src=" https://i.imgur.com/IoZcqgo.jpg " width="180" height="150" class="profile-image rounded mb-4 img-fluid img-thumbnail" alt="profile picture" />';
            echo '</div>';
            echo '<div class = "media-body mb-5 text-white">';
            echo '<h3 class = "mt-0 mb-0">Raghuvarman Jeyakumar</h3>';
            echo '<p class = "small mb-4"><i class = "fa fa-music mr-2"></i>ROCK</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            ?> 
            <div class="py-4 px-4 bg-info">
            <!--user area-->
            <div class="py-4"> 

            <div id="myContacts">

            <!--<div class="py-4 px-4"></div>-->
            <!--<h5 class="mb-2">Contacts</h5>-->

            <div class="row bg-info">
            <div class="col-lg-10 mx-auto">

            <div class = "row py-5 align-center">


            <!--<div id="updateThings"></div>-->


            <div class="register">
            
            <h4>Contact Book</h4>
            <h3>Update a contact</h3>                            
            <h1 ><div  id="errorMsg"  name="errorMsg"></div></h1><br/>
            <input type="text" id="firstName" placeholder="Enter Firstname" name="firstName" required="true" value= "<%= contactToBeUpdated.firstName %>"><br/>                
            <input type="text" id="lastName"  placeholder="Enter Lastname" name="lastName" required="true"  value= "<%= contactToBeUpdated.lastName %>"><br/>              
            <input id="contactNo" placeholder="Contact No" name="contactNo" required="true" type="number" maxlength="10"  value= "<%= contactToBeUpdated.contactNo %>"><br/> 
            <input type="email" id="email" placeholder="Email Address" name="email" required="true" value= "<%= contactToBeUpdated.email %>"><br/>
            <input type="url" id="profilePic" placeholder="Link to Profile Picture" name="profilePic" required="true" value= "<%= contactToBeUpdated.profilePic %>"><br/> 
            <input type="text" id="tag" placeholder="Add a tag" name="tag" required="true" value= "<%= contactToBeUpdated.tag %>"><br/>                                 
            <button  id="updatedContact">Update Contact</button><br>       
            </div>
            

            </div>
            </div>
            </div>
            </div>

            </div>  

            </div>
            <!--user area-->        
            </div>

            </div><!-- End profile-->

            </div>
            </div>

        </script>
        <!-----------------------------------------------------------end all contacts-----------------------------------------------------------> 

        <script language="Javascript">
            var Get = Backbone.Model.extend({
                urlRoot: "/servercwk2016208-2/index.php/ContactBookController/contact",
                idAttribute: 'Id',
                searchContact: function () {
                    var self = this;
                    this.fetch({
                        async: false,
                        data: $.param({name: this.get('name')})
                    })
                },
                insert: function () {
                    this.save({
                        //                                    success: function (b) { alert(b.get('firstName'))}, //not working
                        async: false,
                        data: $.param({firstName: this.get('firstName'),
                            lastName: this.get('lastName'),
                            contactNo: this.get('contactNo'),
                            email: this.get('email'),
                            profilePic: this.get('profilePic'),
                            tag: this.get('tag')}),
                    });
                },
                delete: function () {
                    var self = this;
                    this.destroy({
                        async: false,
                        data: $.param({Id: this.get('Id')})
                    });
                },
                update: function () {
                    var self = this;
                    this.save({
                        async: false,
                        data: $.param({firstName: this.get('firstName'),
                            lastName: this.get('lastName'),
                            contactNo: this.get('contactNo'),
                            email: this.get('email'),
                            profilePic: this.get('profilePic'),
                            tag: this.get('tag'),
                            Id: DeletingContactId}),
                    });
                },
                defaults: {
                    firstName: '',
                    lastName: '',
                    contactNo: '',
                    email: '',
                    profilePic: '',
                    tag: '',
                    Id: null
                }
            });

            var SearchedContacts = Backbone.Collection.extend({
                model: Get,
                url: "/servercwk2016208-2/index.php/ContactBookController/contact",
            });
            var FilterSearch = Backbone.Collection.extend({
                model: Get,
                url: "/servercwk2016208-2/index.php/ContactBookController/contact",
            });
            var searchedContacts = new SearchedContacts();
            var filterSearch = new FilterSearch();

            var DeletingContactId;
            var searchContext = ' ';
            //creating a new contact
            var CreateNewContact = Backbone.View.extend({
                model: searchedContacts,
                el: '#home_content',
                template: _.template($('#creatNewContact').html()),
                initialize: function () {
                    this.render();
                    this.model.on('add', this.render, this);


                },

                render: function () {
                    searchedContacts.fetch({async: false});
                    this.$el.html(this.template());
                    return this;

                },
                events: {
                    "click #createContact": 'InsertAction',
                    "click #ViewContact": 'ViewAllContact',
                    "click #searchButton": 'searchAction',
                    "click #newContact": 'newContact'
                },
                newContact: function () {
                    routerObj.navigate('', true);
                },
                ViewAllContact: function () {
                    routerObj.navigate('viewAll', true);
                },
                InsertAction: function () {
                    var fname = document.getElementById('firstName').value;
                    var lname = document.getElementById('lastName').value;
                    var contactNo = document.getElementById('contactNo').value;
                    var email = document.getElementById('email').value;
                    var profilePic = document.getElementById('profilePic').value;
                    var tag = document.getElementById('tag').value;
                    var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
                            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|' + // domain name
                            '((\\d{1,3}\\.){3}\\d{1,3}))' + // ip (v4) address
                            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + //port
                            '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
                            '(\\#[-a-z\\d_]*)?$', 'i');
                    if (fname.length === 0) {
                        alert('Firstname cannot be null');
                    } else if (fname.length > 50) {
                        alert('Firstname cannot exceed 10 characters');
                    }
                    //lastname validation
                    else if (lname.length === 0) {
                        alert('Lastname cannot be null');
                    } else if (lname.length > 50) {
                        alert('Lastname cannot exceed 10 characters');
                    }
                    //contact number validation
                    else if (contactNo.length === 0) {
                        alert('Contact No cannot be null');
                    } else if (contactNo.length !== 10) {
                        alert('Contact No limit is 10 numbers');
                    }
                    //email validation
                    else if (!(format.test(email))) {
                        alert('Invalid email');
                    } else if (email.length === 0) {
                        alert('Email cannot be null');
                    }
                    //url validation
                    else if (!pattern.test(profilePic)) {
                        alert('Invalid URL');
                    } else if (profilePic.length === 0) {
                        alert('Picture link cannot be null');
                    } else if (tag.length === 0) {
                        alert('Tag cannot be null');
                    }else {
                        var newContactCreation = new Get({'firstName': $('#firstName').val(),
                            'lastName': $('#lastName').val().trim(),
                            'contactNo': $('#contactNo').val().trim(),
                            'email': $('#email').val().trim(),
                            'profilePic': $('#profilePic').val().trim(),
                            'tag': $('#tag').val().trim()});

                        newContactCreation.insert();
                        searchedContacts.add(newContactCreation, {merge: true});
                        routerObj.navigate('viewAll', true);
                    }
                },
                searchAction: function () {
                    searchContext = document.getElementById('Search').value;                   
                    routerObj.navigate('searchResults', true);
                },
            });

            var AllContacts = Backbone.View.extend({
                model: searchedContacts,
                el: '#home_content',
                template: _.template($('#allView').html()),
                initialize: function () {
                    this.render();
                    this.model.on('add', this.render, this);
                    this.model.on('change', this.render, this);
                    this.model.on('remove', this.render, this);
                },

                render: function () {
                    searchedContacts.fetch({async: false});
                    this.$el.html(this.template());                   
                    var self = $('#home_content').find('#showEverything');
                    self.empty();

                    searchedContacts.each(function (c) {
                        var cimg = "<div class = 'col-lg-3 cnt-block equal-hight'><figure class = 'rounded px-10 bg-white shadow-sm'><input type='hidden' id='contactId' value=" + c.get('Id') + ">"
                                + "<img name='myimage' src=" + c.get('profilePic') + " class='customimage img-thumbnail card-img-top img-rounded' alt='profile picture' />" +
                                "<figcaption class='p-4 card-img-bottom'>" + "<h2 class='h5 font-weight-bold mb-2 font-italic'>" + c.get('firstName') + ' </br> ' + c.get('lastName') + " </h2>"
                                + "<lable class='mb-0 text-small text-muted font-italic'><i class = 'fa fa-tag mr-2'></i>" + c.get('tag') + "</lable><br><h1 class='h5 font-weight-bold mb-2 font-italic'><i class='fa fa-phone '> " + c.get('contactNo') + "</i><br><i class='fa fa-id-card'> " + c.get('email') + "</i></h1></figcaption><button  class='btn btn-success btn-block' id='updateContact'>Update Contact</button>" +
                                "<button class='btn btn-danger btn-block' id='deleteContact'>Delete Contact</button></figure></div>";

                        self.append(cimg);
                    });
                },
                events: {
                    "click #deleteContact": 'DeleteAction',
                    "click #updateContact": 'UpdateAction',
                    "click #searchButton": 'searchAction',
                    "click #newContact": 'newContact'
                },
                newContact: function () {
                    routerObj.navigate('', true);
                },
                DeleteAction: function (x) {
                    DeletingContactId = $(x.target).parents('.cnt-block').find('#contactId').val();                  
                    var DeletingContact = new Get({'Id': DeletingContactId});
                    DeletingContact.delete();
                    searchedContacts.remove(DeletingContactId);

                },
                UpdateAction: function (x) {
                    DeletingContactId = $(x.target).parents('.cnt-block').find('#contactId').val();
                    routerObj.navigate('updateContact', true);
                },
                searchAction: function () {
                    searchContext = document.getElementById('Search').value;
                    routerObj.navigate('searchResults', true);
                }
            });

            var UpdateContacts = Backbone.View.extend({
                model: searchedContacts,
                el: '#home_content',
                template: _.template($('#updateView').html()),
                initialize: function () {
                    this.render();
                    //this.model.on('add', this.render, this);                   
                },

                render: function () {
                    searchedContacts.fetch({async: false});
                    var contactToBeUpdated = searchedContacts.get(DeletingContactId);
                    var dataForTemplate = {contactToBeUpdated: contactToBeUpdated.toJSON()}
                    this.$el.html(this.template(dataForTemplate));
                },
                events: {
                    "click #updatedContact": 'UpdateAction',
                    "click #searchButton": 'searchAction',
                    "click #newContact": 'newContact'
                },
                newContact: function () {
                    routerObj.navigate('', true);
                },
                UpdateAction: function (x) {
//                        DeletingContactId = $(x.target).parents('.cnt-block').find('#contactId').val();

                    var ContactUpdate = new Get({'firstName': $('#firstName').val(),
                        'lastName': $('#lastName').val(),
                        'contactNo': $('#contactNo').val(),
                        'email': $('#email').val(),
                        'profilePic': $('#profilePic').val(),
                        'tag': $('#tag').val(),
                        'Id': DeletingContactId, });

                    ContactUpdate.update();
                    searchedContacts.add(ContactUpdate);                     
                    routerObj.navigate('viewAll', {trigger:true});
                    Backbone.history.loadUrl();
                },
                searchAction: function () {
                    routerObj.navigate('searchResults', true);
                }
            });
            //searching for a contact
            var SearchContacts = Backbone.View.extend({
                model: searchedContacts,
                el: '#home_content',
                template: _.template($('#searchResultView').html()),
                initialize: function () {
                    this.render();
                    this.model.on('add', this.render, this);
                    this.model.on('change', this.render, this);
                },

                render: function () {
                    searchedContacts.fetch({async: false});
                    this.$el.html(this.template());

                    var self = $('#home_content').find('#search_Content');
                    self.empty();
                    filterSearch.reset();
//                    searchContext = document.getElementById('Search').value;
                    var multipleName = [];
                    var NameTag = [];
                    var multipleTags = [];                    
                    if (searchContext.includes(' ')) {
                       var  searchValuesArray = searchContext.split(" ");
                    }
                    searchedContacts.each(function (c) {
                        if (searchContext !== null) {                            
                            if (searchContext.includes(" ")) {
                                if (searchValuesArray.indexOf(c.get('firstName')) !== -1) {
                                    if (searchValuesArray.indexOf(c.get('tag')) !== -1) {
                                        NameTag.push(c.get('Id'));
                                        return;
                                    }
                                }
                                if (searchValuesArray.indexOf(c.get('tag')) !== -1) {
                                    if (searchValuesArray.indexOf(c.get('firstName')) === -1) {
                                        multipleTags.push(c.get('Id'));
                                        return;
                                    }
                                }
                                if (searchValuesArray.indexOf(c.get('firstName')) !== -1) {
                                    if (searchValuesArray.indexOf(c.get('tag')) === -1) {
                                        multipleName.push(c.get('Id'));
                                        return;
                                    }
                                }
                            } else {
                                if (searchContext === c.get('firstName') || searchContext === c.get('lastName')) {
                                    filterSearch.add(c);
                                } else if (searchContext === c.get('tag')) {
                                    filterSearch.add(c);
                                }
                            }
                        }
                    });

                    if (NameTag.length !== 0) {
                        searchedContacts.each(function (c) {
                            if (NameTag.indexOf(c.get('Id')) !== -1) {
                                filterSearch.add(c);
                            }
                        });

                    } else if (multipleTags.length !== 0 && NameTag.length === 0) {
                        searchedContacts.each(function (c) {
                            if (multipleTags.indexOf(c.get('Id')) !== -1) {
                                filterSearch.add(c);
                            }
                        });
                    } else if (multipleName.length !== 0 && NameTag.length === 0) {
                        searchedContacts.each(function (c) {
                            if (multipleName.indexOf(c.get('Id')) !== -1) {
                                filterSearch.add(c);
                            }
                        });
                    }
                    filterSearch.each(function (c) {

                        var cimg = "<div class = 'col-lg-3 cnt-block equal-hight'><figure class = 'rounded px-10 bg-white shadow-sm'><input type='hidden' id='contactId' value=" + c.get('Id') + ">"
                                + "<img name='myimage' src=" + c.get('profilePic') + " class='customimage img-thumbnail card-img-top img-rounded' alt='profile picture' />" +
                                "<figcaption class='p-4 card-img-bottom'>" + "<h2 class='h5 font-weight-bold mb-2 font-italic'>" + c.get('firstName') + ' </br> ' + c.get('lastName') + " </h2>"
                                + "<lable class='mb-0 text-small text-muted font-italic'><i class = 'fa fa-tag mr-2'></i>" + c.get('tag') + "</lable><br><h1 class='h5 font-weight-bold mb-2 font-italic'><i class='fa fa-phone '> " + c.get('contactNo') + "</i><br><i class='fa fa-id-card'> " + c.get('email') + "</i></h1></figcaption><button  class='btn btn-success btn-block' id='updateContact'>Update Contact</button>" +
                                "<button class='btn btn-danger btn-block' id='deleteContact'>Delete Contact</button></figure></div>";
                        self.append(cimg);
                    });
                },

                events: {
                    "click #searchButton": 'searchAction',
                    "click #updateContact": 'UpdateAction',
                    "click #deleteContact": 'DeleteAction',
                    "click #ViewContact": 'ViewAllContact',
                    "click #newContact": 'newContact'
                },
                newContact: function () {
                    routerObj.navigate('', true);
                },
                searchAction: function () {
                    var self = $('#home_content').find('#search_Content');
                    self.empty();
                    filterSearch.reset();

                    searchContext = document.getElementById('Search').value;
                    var multipleName = [];
                    var NameTag = [];
                    var multipleTags = [];                    
                    if (searchContext.includes(' ')) {
                      var   searchValuesArray = searchContext.split(" ");
                    }
                    searchedContacts.each(function (c) {
                        if (searchContext !== null) {
                            if (searchContext.includes(" ")) {
                                if (searchValuesArray.indexOf(c.get('firstName')) !== -1) {
                                    if (searchValuesArray.indexOf(c.get('tag')) !== -1) {
                                        NameTag.push(c.get('Id'));
                                        return;
                                    }
                                }
                                if (searchValuesArray.indexOf(c.get('tag')) !== -1) {
                                    if (searchValuesArray.indexOf(c.get('firstName')) === -1) {
                                        multipleTags.push(c.get('Id'));
                                        return;
                                    }
                                }
                                if (searchValuesArray.indexOf(c.get('firstName')) !== -1) {
                                    if (searchValuesArray.indexOf(c.get('tag')) === -1) {
                                        multipleName.push(c.get('Id'));
                                        return;
                                    }
                                }
                            } else {
                                if (searchContext === c.get('firstName') || searchContext === c.get('lastName')) {
                                    filterSearch.add(c);
                                } else if (searchContext === c.get('tag')) {
                                    filterSearch.add(c);
                                }
                            }
                        }
                    });

                    if (NameTag.length !== 0) {
                        searchedContacts.each(function (c) {
                            if (NameTag.indexOf(c.get('Id')) !== -1) {
                                filterSearch.add(c);
                            }
                        });

                    } else if (multipleTags.length !== 0 && NameTag.length === 0 && multipleName.length === 0) {
                        searchedContacts.each(function (c) {
                            if (multipleTags.indexOf(c.get('Id')) !== -1) {
                                filterSearch.add(c);
                            }
                        });
                    } else if (multipleName.length !== 0 && NameTag.length === 0 && multipleTags.length === 0) {
                        searchedContacts.each(function (c) {
                            if (multipleName.indexOf(c.get('Id')) !== -1) {
                                filterSearch.add(c);
                            }
                        });
                    }

                    filterSearch.each(function (c) {

                        var cimg = "<div class = 'col-lg-3 cnt-block equal-hight'><figure class = 'rounded px-10 bg-white shadow-sm'><input type='hidden' id='contactId' value=" + c.get('Id') + ">"
                                + "<img name='myimage' src=" + c.get('profilePic') + " class='customimage img-thumbnail card-img-top img-rounded' alt='profile picture' />" +
                                "<figcaption class='p-4 card-img-bottom'>" + "<h2 class='h5 font-weight-bold mb-2 font-italic'>" + c.get('firstName') + ' </br> ' + c.get('lastName') + " </h2>"
                                + "<lable class='mb-0 text-small text-muted font-italic'><i class = 'fa fa-tag mr-2'></i>" + c.get('tag') + "</lable><br><h1 class='h5 font-weight-bold mb-2 font-italic'><i class='fa fa-phone '> " + c.get('contactNo') + "</i><br><i class='fa fa-id-card'> " + c.get('email') + "</i></h1></figcaption><button  class='btn btn-success btn-block' id='updateContact'>Update Contact</button>" +
                                "<button class='btn btn-danger btn-block' id='deleteContact'>Delete Contact</button></figure></div>";
                        self.append(cimg);
                    });
                    routerObj.navigate('searchResults', true);
                },
                DeleteAction: function (x) {
                    DeletingContactId = $(x.target).parents('.cnt-block').find('#contactId').val();
                    var DeletingContact = new Get({'Id': DeletingContactId});
                    DeletingContact.delete();
                    searchedContacts.remove(DeletingContactId);
                },
                UpdateAction: function (x) {
                    DeletingContactId = $(x.target).parents('.cnt-block').find('#contactId').val();
                    routerObj.navigate('updateContact', true);
                },
                ViewAllContact: function () {
                    routerObj.navigate('viewAll', true);
                },
            });


            var Router = Backbone.Router.extend({
                CreateNewContactObj: null,
                ViewSearchResults: null,
                ViewAllContacts: null,
                UpdateContacts: null,
                routes: {
                    "": 'index',
                    "searchResults": 'contactSearch',
                    "viewAll": 'allContact',
                    "updateContact": 'contactUpdate'
                },

                index: function () {
                    //                        this.createContact =new createContact({el: $('#home-content')});               
                    //                        this.createContact.render();
                    this.CreateNewContactObj = new CreateNewContact();
                    // $(document.body).append("Index route has been called..");
                },
                contactSearch: function () {
                    this.ViewSearchResults = new SearchContacts();
                },
                allContact: function () {
                    this.ViewAllContacts = new AllContacts();
                },
                contactUpdate: function () {
                    this.UpdateContacts = new UpdateContacts();
                }

            });

            var routerObj = new Router();
            Backbone.history.start();





        </script>
    </body>
</html>