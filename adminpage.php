<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="icon" type="image/x-icon" href="favicon-32x32.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-fTJ5aBUJZvNOxKppjei5m+Nm8lJVJHiPeNcb+QlrE47iQtIRa8DIwsZ1Q5hE1jL/ZFA5DdFAv++oqJd4ieVqQw==" crossorigin="anonymous" />
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
   
    <style>
        #load-button {
            color: white;
        }
        /* Customizing hover effect color for table rows */
        .table-hover tbody tr:hover {
            background-color: red; /* Change this to your desired hover color */
        }
        th{
            color:blue;
        }
        body {
    font-family: 'Times New Roman', serif;
    background: url(12.jpg) no-repeat;
    background-size: cover;

}
td {
    color:white;
}
.container{
    background-color: #1211115c;
    backdrop-filter: blur(10px);
    height: auto;
    width: 1500px !important;
    border-radius: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
}
    </style>
</head>
<body>
<div class="container">
<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <h1 class="mt-4">Admin Page</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered table-hover mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="5" class="text-center" id="title">Users Data</th>
                    </tr>
                </thead>
                <tbody id="table-data">
                    <!-- User data will be populated here -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-center">
                            <button type="button" id="load-button" class="btn btn-danger">Load Data</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#load-button").on("click",function(e){
            var button = $(this);
            if(button.text() === 'Load Data') {
                $.ajax({
                    url: "ajax-load.php",
                    type: "POST",
                    success: function(data){
                        $("#table-data").html(data);
                        button.text('Hide Data');
                        $("#title").attr('colspan', '5'); // Remove colspan attribute to span all columns
                    }
                });
            } else {
                $("#table-data").empty();
                button.text('Load Data');
                $("#title").attr('colspan', '5'); // Set colspan to 2 to cover only two columns
            }
        });
    });
</script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
