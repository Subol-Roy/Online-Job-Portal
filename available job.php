<?php
    include("dbconnection.php");
    $sql="SELECT * FROM available_job_post";
    $run=mysqli_query($conn,$sql);
    $company_name="";
    $email="";
    $job_title="";
    $category="";
    $sql="";
    $str="";

    
?>


<!DOCTYPE html>
<html>
<head>
    <title>Available job</title>
    <link rel="stylesheet" href="admin dashboard.css">
</head>
<body>
    <div class="admin">
        <div class="left">
            <a href="index.php"><img src="logo.png" alt=""></a>
            <img src="admin icon.png" alt="">
            <h2 id="ad">Admin</h2>
            <a href="logout.php"><button id="logout">Logout</button></a><br><br>
            <p ><a href="admin dashboard.php">Job Post Request</a></p>
            <p ><a href="available job.php">Avaiable Jobs</a></p>
            <p ><a href="users.php">Users</a></p>
        </div>
        <div class="request">
            <h1>Available Jobs</h1>

        <table>
            <tr>
                <th>Job Provider</th>
                <th>Email</th>
                <th>Category</th>
                <th>Job title</th>
                <th>DELETE</th>
            </tr>
            <?php
            while($data=mysqli_fetch_assoc($run)){
               $company_name=$data['company_name'];
               $email=$data['email'];
               $category=$data['category'];
               $job_title=$data['job_title'];
            ?>
            <tr>
                <td><?php echo($company_name);?></td>
                <td><?php echo($email);?></td>
                <td><?php echo($category);?></td>
                <td><?php echo($job_title);?></td>
                <td style="background-color:red;"><a href="delete_job_post.php?id=<?php echo($data['id']);?>" onclick='return checkdelete()'>DELETE</a> </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <script>
            function checkdelete()
            {
                return confirm('Are you sure to delete this job post?');
            }
        </script>
        </div>
        
    </div>
</body>
</html>