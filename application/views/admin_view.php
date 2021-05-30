<h1>Admin</h1>
<?php
  if ($_SESSION['role'] === "1") {
    // Logout
    echo "<a href='/admin/out'>Log out</a><br><br>";

    echo "
    <form action='/admin/add_user' method='POST'>
      Add new user<br>
      <input type='text' name='login' placeholder='Login' required />
      <br>
      <input type='text' name='password' placeholder='Password' required />
      <br>
      <select name='role'>
        <option>user</option>
        <option>admin</option>
      </select>
      <br>
      <input type='submit' value='Add' />
    </form><br>
    ";

    // User table
    echo "<table>User<tr><td>Id</td><td>Delete</td><td>Login</td><td>Password</td></tr>";
    foreach($data['users'] as $row)
    {
      echo '<tr><td><form method="post" action="admin/detail_user"><input type="submit" name="id" value="'.$row['id'].'"/>'
      .'</form></td>'.'<td><form method="post" action="admin/delete_user"><input type="submit" name="id" value="'.$row['id'].'"/></form></td><td>'.$row['login']
      .'</td><td>'.$row['password']
      .'</td></tr>';
    }
  } else {
?>
<form method="post" action="/admin/login">
  Login: <input type="text" name="login" /><br /><br />
  Password: <input type="password" name="password" /> <br /><br />
  <input type="submit" />
</form>
<?php
}
