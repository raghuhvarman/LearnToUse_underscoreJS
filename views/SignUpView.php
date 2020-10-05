<html>
    <head>
        <title>Signup</title>   
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

        <style>

            .signup{
                position: relative;                
                margin: 5% auto;
                background: #ecf0f1;
                width: 350px;
                border-radius: 5px;
                box-shadow: 3px 3px 10px #129FEA;
                padding: 20px;
            }
            body{
                background-image: url('../../images/mic.jpg');
                background-size: 100%;
            }
            h3 {
                text-align: center;
                font-weight: 200;
                font-size: 2em;
                margin-top: 10px;
                color: #34495e;
            }
            h4 {
                text-align: center;
                font-weight:200;
                font-size: 2.5em;
                margin-top: 10px;
                color: #129FEA;
            }
            button {
                background: #e74c3c;
                border: #e74c3c;
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
            input
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
            a {
                text-align: center;
                font-size: 10px;
                color: #3498db;
                padding-bottom: 10px;
            }
            .errorText{
                margin-left: 10%;
                margin-right: 10%;
                color: #e74c3c;
            }
        </style>
        <script>
            function validate() {
                document.getElementById("errorText").innerHTML = "";
            }
        </script>
    </head>
    <body>

        <div class='signup'>
            <h4>Monkey Music</h4>
            <h3>Create an account</h3>

            <div class="errorText" id="errorText">
                <?php
                if (isset($verifyUser)) {
                    echo '<label id="errorText">Username' . ' ' . $verifyUser['username'] . ' is not available</label>';
                }
                ?>
            </div>
            <form action="/servercwk2016208-2/index.php/LoginController/userSignup" method="POST" align='center' >
                <input  id="userName" name="userName" type="text" placeholder="Enter the User Name" onfocus="validate()" required="true"/><br>
                <input  id="password" name="password" type="password" placeholder="Enter the Password" required="true"/><br>
                <button type="submit" value="Sign Up" name="Sign Up" >Sign Up</button><br>                   
                <a href="/servercwk2016208-2/index.php/LoginController">Already a member? Login</a>
            </form>
        </div>
    </body>
</html>