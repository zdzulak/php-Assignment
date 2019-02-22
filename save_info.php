    <?php
      require('includes/header.php');

      // adding user_id for if the user wants to edit
      $user_id = NULL;

      if(isset($_POST['submit'])){
      // setting the info the user put in into variables
      $name = $_POST ['name'];
      $email = $_POST ['email'];
      $location = $_POST ['location'];
      $skills = $_POST ['skills'];

      // validate that the user input a proper email
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("Thanks $name! We have verified your email as $email");
      }
      else {
        echo("$email is not a valid email address");
      }

      //connect to database
      require('includes/db.php');

      // set up SQL query
      $sql = "INSERT INTO users (name, email, location, skills) VALUES (:name, :email, :location, :skills)";

      // prepare query
      $cmd = $conn->prepare($sql);

      // blind parameters
      $cmd->bindParam(':name', $name);
      $cmd->bindParam(':email', $email);
      $cmd->bindParam(':location', $location);
      $cmd->bindParam(':skills', $skills);

      // need to bind if updating info
      if (!empty($user_id)) {
        $cmd->bindParam(':user_id', $user_id);
      }

      // run the query
      $cmd->execute();

      echo "<p>Thank you for sharing your info</p>";
      echo '<p>See other people\'s submissions <a href="users.php">here</a></p>';

      // close db connection
      $cmd->closeCursor();
    } 
    ?>

  </body>
</html>
