<?php
$id = $data['id'];
$user = $data['user'];
echo "<fieldset>
  <legend>Change $id</legend>
  <form method='POST' action='/admin/change_user'>
    Login of user <input type='text' name='login' required /><br><br>
    Password of user <input type='text' name='password' required /><br><br>
    <input type='text' name='id' value='$id' style='display:none;' />
    <input type='submit' value='Change' />
  </form>
</fieldset><br>";

echo "<table><tr><td>Id</td><td>Login</td><td>Password</td></tr>";
echo '<tr><td>'.$user['id']
.'</form></td><td>'.$user['login']
.'</td><td>'.$user['password']
.'</td></tr>';
echo "</table>";
?>
