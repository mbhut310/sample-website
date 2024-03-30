<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.js"></script>
    <script src="additional-methods.min.js"></script>
    <style>
        .error {
            color: red;
            font-size: 16px;
        }

        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        input[type=text],
        textarea,
        select,
        input[type=file] {
            border: 1px solid black;
            height: 30px;
            width: 100%;
        }

        input[type=submit] {
            border: 3px solid black;
            height: 30px;
            width: 20%;
            background-color: white;
            border-radius: 5px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $.validator.addMethod("fnregex", function (value, element) {
                var regex = /^[a-zA-Z ]+$/;
                return this.optional(element) || regex.test(value);
            }, "Firstname must contain only letters");


            $.validator.addMethod("emregex", function (value, element) {
                regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i;
                return this.optional(element) || regex.test(value);

            }, "Please enter a valid email address.");

            $.validator.addMethod("pwdregex", function (value, element) {
                    regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/;
                    return this.optional(element) || regex.test(value);
                },
                "Password must contain atleast one uppercase letter, one lowercase letter, one digit and a special character"
            );

            $.validator.addMethod("mobregex", function (value, element) {
                regex = /^[0-9]{10}$/;
                return this.optional(element) || regex.test(value);
            }, "Mobile number must contain exactly 10 digits");

            $.validator.addMethod("filesize", function (value, element, size) {
                var maxSize = size * 1024 * 1024;
                for (var i = 0; i < element.files.length; i++) {
                    var fileSize = element.files[i].size;
                    if (fileSize > maxSize) {
                        return false;
                    }
                }
                return true; // File size is within the maximum limit
            }, "File size cannot exceed {0} MB.");

            $.validator.addMethod("atLeastTwoChecked", function (value, element) {
                return $('input[name="hobbies"]:checked').length >= 2;
            }, "Please select at least two checkboxes.");

            $('#reg').validate({
                ignore: ":hidden:not(#profile_pic1)",
                rules: {
                    fn: {
                        required: true,
                        minlength: 2,
                        maxlength: 25,
                        fnregex: true
                    },
                    em: {
                        required: true,
                        emregex: true
                    },
                    gender: "required",
                    hobbies: {
                        atLeastTwoChecked: true,
                        required: true,
                    },
                    state: "required",
                    mobile: {
                        required: true,
                        mobregex: true
                    },
                    pwd: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        pwdregex: true
                    },
                    repwd: {
                        required: true,
                        equalTo: '#pwd1'
                    },
                    address: "required",
                    profile_pic: {
                        required: true,
                        accept: "image/jpeg,image/png,image/gif",
                        filesize: 2
                    }

                },
                messages: {
                    fn: {
                        required: "Fullname is required Field",
                        minlength: "Fullname must contain atleast 2 characters",
                        maxlength: "Fullname must contain maximum 25 characters"
                    },
                    em: {
                        required: "Email is a required Field",
                        email: "Invalid Email address"
                    },
                    gender: {
                        required: "Gender is a required field"
                    },
                    hobbies: {
                        required: "Hobbies is a required field"
                    },
                    state: {
                        required: "State is a required field"
                    },
                    pwd: {
                        required: "Password is a required Field",
                        minlength: "Password must contain at least 8 characters",
                        maxlength: "Password must not be more than 20 characters"
                    },
                    address: {
                        required: "Address is a required field"
                    },
                    mobile: {
                        required: "Mobile number is a required field",
                    },
                    repwd: {
                        required: "Confirm password cannot be empty",
                        equalTo: "Password and confirm password must be same"
                    },
                    profile_pic: {
                        required: "Please select a file to upload",
                        accept: "only imge file with extension jpg,png and gif are allowed",
                        filesize: "File size must not be greater than 10KB"
                    }

                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") === "fn") {
                        $('#fn1_error').html(error);
                    }
                    if (element.attr("name") === "em") {
                        $('#email_error').html(error);
                    }
                    if (element.attr("name") === "gender") {
                        $('#gender_error').html(error);
                    }
                    if (element.attr("name") === "pwd") {
                        $('#pwd_error').html(error);
                    }
                    if (element.attr("name") === "repwd") {
                        $('#repwd_error').html(error);
                    }
                    if (element.attr("name") === "mobile") {
                        $('#mobile_error').html(error);
                    }
                    if (element.attr("name") === "hobbies") {
                        $('#hobbies_error').html(error);
                    }
                    if (element.attr("name") === "state") {
                        $('#state_error').html(error);
                    }
                    if (element.attr("name") === "address") {
                        $('#address_error').html(error);
                    }
                    if (element.attr("name") === "profile_pic") {
                        $('#profile_error').html(error);
                    }
                },
            });
        });
    </script>
</head>
<body>
    <form id="reg" method="post" enctype="multipart/form-data">
        <table align="center" style="border: 1px solid black;background-color:#ebf0f0; padding: 30px;" width="50%">
            <tr>
                <td align=" center">
                    <h1>Registartion</h1>
                </td>
            </tr>
            <tr>
                <td><label for="fn1"><span>*</span>Fullname</label> </td>

            </tr>
            <tr>
                <td><input type="text" name="fn" id="fn1" placeholder="Ex. Janki Kansagra"></td>
            </tr>
            <tr>
                <td> <span id="fn1_error"></span></td>

            </tr>
            <tr>
                <td><label for="email1"><span>*</span>Email Address</label> </td>

            </tr>
            <tr>
                <td><input type="text" name="em" id="email1" placeholder="Ex. janki.kansagra@rku.ac.in"></td>
            </tr>
            <tr>
                <td> <span id="email_error"></span></td>

            </tr>
            <tr>
                <td><label><span>*</span>Select Gender</label> </td>

            </tr>
            <tr>
                <td><input type="radio" name="gender" value="Male">Male
                    <input type="radio" name="gender" value="Female">Female
                </td>
            </tr>
            <tr>
                <td> <span id="gender_error"></span></td>

            </tr>
            <tr>
                <td><label><span>*</span>Select Hobbies</label> </td>

            </tr>
            <tr>
                <td><input type="checkbox" name="hobbies" value="Watching Movies">Watching Movies
                    <input type="checkbox" name="hobbies" value="Reading Books">Reading Books
                    <input type="checkbox" name="hobbies" value="Cooking">Cooking
                    <input type="checkbox" name="hobbies" value="Palying Sports">Playing Sports
                </td>
            </tr>
            <tr>
                <td> <span id="hobbies_error"></span></td>

            </tr>

            </tr>
            <tr>
                <td><label for="state1"><span>*</span>Select State</label> </td>

            </tr>
            <tr>
                <td>
                    <select name="state" id="state1">
                        <option value="Gujarat" selected>Gujarat</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Bihar">Bihar</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td> <span id="state_error"></span></td>
            </tr>
            <tr>
                <td><label for="mobile1"><span>*</span>Mobile Number</label> </td>
            </tr>
            <tr>
                <td><input type="text" name="mobile" id="mobile1" placeholder="Ex. 1234567890"></td>
            </tr>
            <tr>
                <td> <span id="mobile_error"></span></td>

            </tr>
            <tr>
                <td><label for="pwd1"><span>*</span>Password</label> </td>

            </tr>
            <tr>
                <td><input type="text" name="pwd" id="pwd1"></td>
            </tr>
            <tr>
                <td> <span id="pwd_error"></span></td>

            </tr>
            <tr>
                <td><label for="repwd1"><span>*</span>Confirm Password</label> </td>

            </tr>
            <tr>
                <td><input type="text" name="repwd" id="repwd1"></td>
            </tr>
            <tr>
                <td> <span id="repwd_error"></span></td>

            </tr>
            <tr>
                <td><label for="address"><span>*</span>Address</label> </td>

            </tr>
            <tr>
                <td><textarea id="address" name="address"></textarea></td>
            </tr>
            <tr>
                <td> <span id="address_error"></span></td>

            </tr>
            <tr>
                <td><label for="profile_pic1"><span>*</span>Address</label> </td>

            </tr>
            <tr>
                <td><input type="file" id="profile_pic1" name="profile_pic"></td>
            </tr>
            <tr>
                <td> <span id="profile_error"></span></td>

            </tr>
            <tr>
                <td align="center"> <input type="submit" id="submit1" value="Register"></td>
            </tr>
        </table>
    </form>
</body>

</html>