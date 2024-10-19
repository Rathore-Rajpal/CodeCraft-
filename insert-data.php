<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="icon" type = "image/x-icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="admin.css"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d01fd9c369.js" crossorigin="anonymous"></script>
  <style>
    body {
    font-family: Arial, sans-serif;
    background: url(12.jpg) no-repeat;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
}
#main {
    width: 80%;
    margin: 50px auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 10px;
    overflow: hidden; /* Added overflow to contain table and prevent stretching */
}
#header {
    background-color: #007bff;
    color: #fff;
    padding: 20px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
h1 {
    margin: 0;
    font-size: 24px;
}
#table-form {
    padding: 20px;
}
input[type="text"], input[type="email"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
    width: calc(100% - 22px);
}
#save-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}
#save-button:hover {
    background-color: #0056b3;
}
#error-message, #success-message {
    padding: 10px;
    margin-bottom: 10px;
    display: none;
    border-radius: 5px;
}
#error-message {
    background-color: #dc3545;
    color: #fff;
}
#success-message {
    background-color: #28a745;
    color: #fff;
}
#modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
}
#modal-form {
    background-color: #fff;
    width: 50%;
    max-width: 500px;
    padding: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
}
#close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}
#close-btn:hover {
    color: #007bff;
}
/* Table Styles */
#table-data {
    padding: 20px;
}
table {
    width: 100%;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}
th {
    background-color: #007bff;
    color: #fff;
}
tr:hover {
    background-color: #f2f2f2;
}
.edit-btn, .delete-btn {
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.edit-btn:hover, .delete-btn:hover {
    background-color: #007bff;
    color: #fff;
}
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="fa-solid fa-bug"></i>&nbsp;&nbsp;CodeCraft!</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/loginsystem/save_response.php">User's Feedback</a>
        </li>
       <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/loginsystem/userqueries.php">User's Queries</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/loginsystem/logo.php">  Logout</a>
       </li>
      </ul>
    </div>
  </div>
</nav>

    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>Admin's Dashboard</h1>
                <div id="search-bar">
                    <label>Search User: </label>
                    <input type="text" id="search" autocomplete="off">
                </div>
            </td>
        </tr>
        <tr>
            <td id="table-form">
                <form id="addform">
                    First Name: <input type="text" id="fname">&nbsp;&nbsp;
                    Last Name: <input type="text" id="lname">&nbsp;&nbsp;
                    Username: <input type="text" id="usname">&nbsp;&nbsp;
                    Email: <input type="email" id="email">&nbsp;&nbsp;
                    <input type="submit" id="save-button" value="Save">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data">
                <table>
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table rows will be dynamically generated here -->
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <div id="error-message"></div>
    <div id="success-message"></div>
    <div id="modal">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <table cellpadding="10px" width="100%">
            </table>
            <div id="close-btn">X</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
         <script type="text/javascript">
            $(document).ready(function(){
                function loadTable(){
                    $.ajax({
                    url: "ajax-load.php",
                    type: "POST",
                    success: function(data){
                        $("#table-data").html(data);
                    }
                });
                }
                loadTable();
                $("#save-button").on("click",function(e){
                    e.preventDefault();
                    var fname = $("#fname").val();
                    var lname = $("#lname").val();
                    var username = $("#usname").val();
                    var email = $("#email").val();
                    if(fname == "" || lname == "" || username == "" || email == ""){
                        $("#error-message").html("All Fields Are Required.").slideDown();
                        $("#success-message").slideUp();
                    }else{
                        $.ajax({
                        url: "ajax-insert.php",
                        type: "POST",
                        data: {first_name: fname, last_name: lname, user_name: username, emails: email },
                        success: function(data){
                            if(data==1){
                                loadTable();
                                $("#addform").trigger("reset");
                                $("#success-message").html("Data Inserted Successfully.").slideDown();
                                $("#error-message").slideUp();
                            }else{
                                
                                $("#error-message").html("cannot Insert.").slideDown();
                                $("#success-message").slideUp();
                            }
                           
                        }
                    });

                    }

                  
                })
                $(document).on("click",".delete-btn", function(){
                    if(confirm("Are You Sure you Want to Delete the record ?")){
                    var userId = $(this).data("id");
                    var element = this;
                    $.ajax({
                        url: "ajax-delete.php",
                        type: "POST",
                        data: {id: userId},
                        success : function(data){
                            if(data==1){
                                  $(element).closest("tr").fadeOut();
                            }else{
                                $("#error-message").html("cannot Delete Record.").slideDown();
                                $("#success-message").slideUp();
                            }
                        }

                    });
                }
                
                });
                $(document).on("click",".edit-btn",function(){
                    $("#modal").show();
                    var userid = $(this).data("eid");
                    $.ajax({
                        url: "load-update-form.php",
                        type: "POST",
                        data: {id: userid},
                        success: function(data){
                            $("#modal-form table").html(data)
                        }
                    });
                });
                $("#close-btn").on("click",function(){
                    $("#modal").hide();
                });

                $(document).on("click","#edit-submit", function(){
                    var usId = $("#edit-id").val();
                    var usfname = $("#edit-fname").val();
                    var uslname = $("#edit-lname").val();
                    var usname = $("#edit-uname").val();
                    var usemail = $("#edit-email").val();
                    $.ajax({
                        url: "ajax-update-form.php",
                        type: "POST",
                        data: {ids: usId, fnames: usfname, lnames: uslname, usnames: usname, emails: usemail},
                        success: function(data){
                            if(data==1){
                                $("#modal").hide();
                                loadTable();
                            }
                        }

                    });
                });

                $("#search").on("keyup",function(){
                    var search_term = $(this).val();
                     
                    $.ajax({
                        url: "ajax-live-search.php",
                        type: "POST",
                        data: { search: search_term},
                        success: function(data){
                        $("#table-data").html(data);
                        }
                    });
                });
               
            });
            
        </script>
<script>
    let slider = document.querySelector('.slider');
    let slides = document.querySelectorAll('.slide');
    let slideWidth = slides[0].clientWidth;
    let slideIndex = 0;
    let navigation = document.querySelector('.navigation');

    function createNavButtons() {
        for (let i = 0; i < slides.length; i++) {
            let btn = document.createElement('div');
            btn.classList.add('nav-btn');
            if (i === slideIndex) {
                btn.classList.add('active');
            }
            btn.addEventListener('click', () => {
                slideIndex = i;
                updateSlider();
                updateNavButtons();
            });
            navigation.appendChild(btn);
        }
    }

    function updateSlider() {
        slider.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
    }

    function updateNavButtons() {
        let buttons = document.querySelectorAll('.nav-btn');
        buttons.forEach((btn, index) => {
            if (index === slideIndex) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    }

    createNavButtons();

    setInterval(() => {
        slideIndex++;
        if (slideIndex >= slides.length) {
            slideIndex = 0;
        }
        updateSlider();
        updateNavButtons();
    }, 4000); // Change slide every 4 seconds
</script>
</body>
</html>
