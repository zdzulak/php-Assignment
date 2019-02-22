<?php require('includes/header.php');

//initializing variables
$user_id = null;
$name = null;
$email = null;
$location = null;
$skills = null;

if(!empty($_GET['user_id']) && (is_numeric($_GET['user_id']))) {

// grab the user_id from the URL string
$user_id = $_GET['user_id'];

// connect to the database
require('includes/db.php');

// set up the query
$sql = "SELECT * FROM users WHERE user_id = :user_id";

// prepare
$cmd = $conn->prepare($sql);

// bind
$cmd->bindParam(':user_id', $user_id);

// execute
$cmd->execute();

// use fetchAll method to store the info into an array
$people = $cmd->fetchAll();

// loop through the array using foreach and set variables
foreach ($people as $person) {
  $name = $person['name'];
  $email = $person['email'];
  $location = $person['location'];
  $skills = $person['skills'];
}

// close the database connection
$cmd->closeCursor();
}

?>

    <h1> Tell Us About Yourself </h1>

    <form method='post' action="save_info.php">
      <div class="info-boxes">
        <input type="text" name="name" placeholder="Give Us Your Name" required/>
        </br>
        <input type="email" name="email" placeholder="Give Us Your Email" required/>
        </br>
        <input type="text" name="location" placeholder="Tell Us Your Location" required/>
        </br>
        <input type="text" name="skills" placeholder="Tell Us Your Skills" required/>
        </br>
      </div>
        <input type="hidden" name="user_id" value="<?php echo $user_id?>">
        <input type='submit' name='submit' value='Submit'/>
    </form>

  </body>
</html>
