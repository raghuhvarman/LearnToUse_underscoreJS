<!DOCTYPE html>
<html>
    <head>
        <title>User data</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>


        <script>           
            $(function () {
                $('.selectpicker').selectpicker();
            });
        </script>

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
            input,select
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
                text-align-last: auto;
                font-size: 10px;
                color: #3498db;
                padding-bottom: 10px;
            }

        </style>

    </head>

    <body>

        <div class="register">
            <h4>Monkey Music</h4>
            <h3>Register an account</h3>           

            <form  action="/servercwk2016208-2/index.php/LoginController/createProfile" method="POST">                
                <input type="text" id="firstName" placeholder="Enter Firstname" name="firstName" required="true"><br/>                
                <input type="text" id="lastName" placeholder="Enter Lastname" name="lastName" required="true"><br/>                
                <select multiple id="genre" name="genre" data-style="bg-white" class="selectpicker w-95" required="true">
                    <option  value="Rock">Rock</option>
                    <option  value="Country">Country</option> 
                    <option  value="Pop">Pop</option>
                    <option  value="Melody">Melody</option>
                    <option  value="Folk">Folk</option>
                </select>                
                <input type="url" id="profilePic" placeholder="Link to Profile Picture" name="profilePic" required="true"><br/>
                <input type="hidden" id="userSelection"  name="userSelection"><br/>
                <button type="submit" >Register</button><br>

                <a href="/servercwk2016208/index.php/LoginController"><center>Already a member? Login</center> </a>
            </form>            
        </div>
    </body>

</body>
</html>