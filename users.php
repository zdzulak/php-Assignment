<?php require('includes/header.php');

ob_start();

try {

  // connecting to the database
  require('includes/db.php');

  // setting up the sql query
  $sql = "SELECT * FROM users;";

  // prepare
  $cmd = $conn->prepare($sql);

  // execute
  $cmd->execute();

  // using fetchAll to store the results
  $users = $cmd->fetchAll();

  echo '<table class="table">
          <thead>
            <th> Name </th>
            <th> Email </th>
            <th> Location </th>
            <th> Skills </th>
            <th> Edit? </th>
            <th> Delete?</th>
          </thead>
          <tbody>';

  foreach($users as $user) {
    echo '<tr><td>' . $user['name'] . '</td>';
    echo '<td>' . $user['email'] . '</td>';
    echo '<td>' . $user['location'] . '</td>';
    echo '<td>' . $user['skills'] . '</td>';
    echo '<td><a href="index.php?user_id='. $user['user_id']. '">Edit </a></td>';
    echo '<td><a href="delete.php?user_id=' . $user['user_id'] .'"onclick="return confirm(\'Are you sure?\');"> Delete </a></td></tr>';
  }

  echo '</tbody></table>';

  // closing the connection to the database
  $cmd->closeCursor();

}

catch(PDOException $e) {
  mail('zdzulak@lakeheadu', 'Users Database Problems', $e);
}

ob_flush();

?>
</body>
</html>
