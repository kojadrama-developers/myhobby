

<div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registration</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="user/registration" method="post" onsubmit="return Validate()" name="vForm">


                    <div class="form-group" id="first_div">
                        <input type="text" class="form-control" id="firstName" placeholder="First Name" name="first_name">
                        <div  id="fname_error"></div>
                    </div>

                    <div class="form-group" id="last_div">
                        <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="last_name">
                        <div id="lname_error"></div>
                    </div>

                    <div class="form-group" id="email_div">
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        <div id="email_error"></div>
                    </div>

                    <div class="form-group" id="password_div">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">

                    </div>
                    <div class="form-group" id="password_confirm_div">
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="password_confirm">
                        <div id="password_error"></div>
                    </div>
                    <div class="form-group" id="birth_div">
                        <input type="date" class="form-control" id="date" name="date_of_birth">
                        <div id="birth_error"></div>
                    </div>
                    <div class="form-group" id="state_div">
                        <input type="text" class="form-control" id="state" name="state" placeholder="State"> 
                    </div>
                    <div class="form-check">
                        <label class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="radio1" name="sex" value="Male" checked="checked"> Male
                        </label>
                        <label class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="radio2" name="sex" value="Female"> Female
                        </label>
                        <div id="sex_error"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="register_btn">Register</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript">
    //getting all input text object
    var first_name = document.forms["vForm"]["first_name"];



    var last_name = document.forms["vForm"]["last_name"];
    var email = document.forms['vForm']['email'];
    var password = document.forms['vForm']['password'];
    var password_confirm = document.forms['vForm']['password_confirm'];




    //getting all error display object
    var fname_error = document.getElementById("fname_error");
    var lname_error = document.getElementById("lname_error");
    var email_error = document.getElementById("email_error");
    var password_error = document.getElementById('password_error');



    //setting all events listeners
    first_name.addEventListener("blur", firstVerify, true);
    last_name.addEventListener("blur", lastVerify, true);
    email.addEventListener('blur', emailVerify, true);
    password.addEventListener('blur', passwordVerify, true);


    //validation function
    function Validate(){
        if (first_name.value == ""){
            first_name.style.border = "1px solid red";
            document.getElementById('first_div').style.color = "red";
            fname_error.textContent = "Firstname is required";
            first_name.focus();
            return false;
        }
        if (last_name.value == ""){
            last_name.style.border = "1px solid red";
            document.getElementById('last_div').style.color = "red";
            lname_error.textContent = "Lastname is required";
            last_name.focus();
            return false;
        }
        if (email.value == "") {
            email.style.border = "1px solid red";
            document.getElementById('email_div').style.color = "red";
            email_error.textContent = "Email is required";
            email.focus();
            return false;
        }
        if (password.value == "") {
            password.style.border = "1px solid red";
            document.getElementById('password_div').style.color = "red";
            password_confirm.style.border = "1px solid red";
            password_error.textContent = "Password is required";
            password.focus();
            return false;
        }
        if (password.value != password_confirm.value) {
            password.style.border = "1px solid red";
            document.getElementById('password_confirm_div').style.color = "red";
            password_confirm.style.border = "1px solid red";
            password_error.innerHTML = "The two passwords do not match";
            return false;
        }
    }
    //event handler functions
    function firstVerify() {
        if (first_name.value != "") {
            first_name.style.border = "1px solid #5E6E66";
            document.getElementById('first_div').style.color = "#5e6e66";
            fname_error.innerHTML = "";
            return true;
        }

    }
    function lastVerify() {
        if (last_name.value != "") {
            last_name.style.border = "1px solid #5E6E66";
            document.getElementById('last_div').style.color = "#5e6e66";
            lname_error.innerHTML = "";
            return true;
        }

    }
    function emailVerify() {
        if (email.value != "") {
            email.style.border = "1px solid #5e6e66";
            document.getElementById('email_div').style.color = "#5e6e66";
            email_error.innerHTML = "";
            return true;
        }
    }
    function passwordVerify() {
        if (password.value != "") {
            password.style.border = "1px solid #5e6e66";
            document.getElementById('password_confirm_div').style.color = "#5e6e66";
            document.getElementById('password_div').style.color = "#5e6e66";
            password_error.innerHTML = "";
            return true;
        }

        if (password.value === password_confirm.value) {
            password.style.border = "1px solid #5e6e66";
            document.getElementById('password_confirm_div').style.color = "#5e6e66";
            password_error.innerHTML = "";
            return true;
        }
    }


</script> -->