<h1>Login</h1>

<?php
  if ($_SESSION['is_auth']) {
    echo "<a href='/login/out'>Log Out</a><br>";

    echo "
    <br><form action='/login/add_exhibit' method='POST'>
      Add new exhibit<br>
      <input type='text' name='title' placeholder='Title' required /><br>
      <input type='text' name='description' placeholder='Description' required /><br>
      <input type='submit' value='Add' />
    </form><br>
    ";

    // Exhibits table
    echo "<table>User<tr><td>Id</td><td>Delete</td><td>Title</td><td>Description</td></tr>";
    foreach($data['exhibits'] as $row)
    {
      echo '<tr><td><form method="post" action="login/detail_exhibit"><input type="submit" name="id" value="'.$row['id'].'"/>'
      .'</form></td>'.'<td><form method="post" action="login/delete_exhibit"><input type="submit" name="id" value="'.$row['id'].'"/></form></td><td>'.$row['title']
      .'</td><td>'.$row['description']
      .'</td></tr>';
    }
  } else {
?>
<fieldset>
  <form method="POST" action="/login/login">
    Enter your login <input type="text" name="login" required /><br><br>
    Enter your password <input type="text" name="password" required /><br><br>
    <input type="submit" value="Log In" />
  </form>
</fieldset>
<?php
}
