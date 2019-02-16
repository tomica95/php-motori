<?php 

    include "php/admin_panel/users.php";

    //vraca sve uloge za dropdown
    include "php/admin_panel/uloge.php";


    // include "php/admin_panel/delete_users.php"

    

?>
<h1>Prikaz svih usera</h1>
<table border="1" id="korisnici-tabela">
    <tr>
        <td>Id</td>
        <td>Username</td>
        <td>Email</td>
        <td>Uloga</td>
    </tr>
<?php foreach($users as $user):?>
    <tr>
        <td><?= $user->id_user ?></td>
        <td><?=$user->username ?></td>
        <td><?= $user->email ?></td>
        <td><?= $user->role?></td>
        <td><input type="button" value="Obrisi" class="delete" id="<?=$user->id_user?>" name="delete"></td>
        
    </tr>


<?php endforeach; ?>
</table>

<!-- update korisnika -->
<hr>Editovanje user-a
</br>
<form method="POST" action="php/admin_panel/update_user.php">
    Username user-a za editovanje<select name="user">
        <option>Izaberite korisnika</option>
        <?php foreach($users as $user): ?>
        <option value="<?=$user->id_user?>"><?=$user->username?></option>
        <?php endforeach; ?>
    </select>
</br>
    Email:<input type="text" name="email"></br>

    Username:<input type="text" name="username"></br>

    Password:<input type="password" name="password"></br>

    <input type="submit" value="Izmeni user-a">
</form>





<h1>Unos user-a</h1>
<!--unos korisnika -->
<form method="POST" action="php/admin_panel/insert_users.php">
Username: <input type="text" name="tbUserName"></br>
Email: <input type="email" name="tbEmail"></br>
Password:<input type="password" name="tbPassword"></br>
<select name="list"><option>Izaberite ulogu korisnika</option>
<?php foreach($roles_ as $role): ?>
<option value="<?= $role->id_role?>"><?=$role->role?></option>
<?php endforeach; ?>
</select>
<input type="submit" name="insert" value="Unos korisnika">
</form>
