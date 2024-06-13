<?php
$this->title = 'Модерація користувачів';

if(empty($users))
    $users = [];
?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Керування користувачами</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Ім'я користувача</th>
            <th>Пошта</th>
            <th>Роль</th>
            <th>Видалити</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user) {
            ?>
            <tr>
                <td><?php echo $user['id'];?></td>
                <td><?php echo $user['firstname'].' '.$user['lastname'];?></td>
                <td><?php echo $user['login'];?></td>
                <td>
                    <form method="post" action="/users/moderation/<?php echo $user['id'];?>">
                        <select class="form-control" name="role">
                            <option value="<?php echo $user['role'];?>"><?php if($user['role'] === null){ echo 'Без ролі'; } else echo $user['role']?></option>
                            <option value="admin">admin</option>
                            <option value="moder">moder</option>
                            <option value="Без ролі">Без ролі</option>
                        </select>
                        <button class="btn btn-outline-success mt-2" type="submit" name="action" value="updateRole">Зберегти</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="/users/deleteuser/<?php echo $user['id'];?>">
                        <button class="btn btn-outline-danger" type="submit" name="action" value="deleteUser">Видалити</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>