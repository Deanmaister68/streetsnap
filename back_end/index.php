<?php
$servername = "localhost";
$username = "john";
$password = "";
$dbname = "mode";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>

<?php
$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Post ID: " . $row["post_id"] . "<br>";
        echo "Content: " . $row["content"] . "<br>";
        echo "Likes: " . $row["likes"] . "<br>";
        // ...and so on
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

<html>
<head>
    <title>My Form</title>
</head>
<body>
    <form>
        <label for="postContent">Post content:</label>
        <input type="text" id="postContent" name="postContent"><br><br>
        <button type="button" onclick="submitForm()">Submit</button>
    </form>
    
    <div id="result"></div>
    
    <script>
        function submitForm() {
            var content = document.getElementById("postContent").value;
            
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "submit_post.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("content=" + content);
        }
    </script>
</body>
</html>




