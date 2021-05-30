<?php
$id = $data['id'];
$title = $data['title'];
$description = $data['description'];
echo "<fieldset>
  <legend>Change $id</legend>
  <form method='POST' action='/login/change_exhibit'>
    Login of exhibit <input type='text' name='title' required /><br><br>
    Password of exhibit <input type='text' name='description' required /><br><br>
    <input type='text' name='id' value='$id' style='display:none;' />
    <input type='submit' value='Change' />
  </form>
</fieldset><br>";

echo "<table><tr><td>Id</td><td>Login</td><td>Description</td></tr>";
echo '<tr><td>'.$id
.'</form></td><td>'.$title
.'</td><td>'.$description
.'</td></tr>';
echo "</table>";
?>
