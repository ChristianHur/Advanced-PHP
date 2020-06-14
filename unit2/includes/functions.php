<?php
//Function utilities

function isAllowed(){
    if(!isset($_SESSION['user'])){
        header("Location: vehicle.php");
    }
}

function showHeader(){
    $user = "Guest";
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
    ?>
    <header>
        <h1>Awesome Guestbook</h1>
        <?= getTopNav() ?>
        <div class="user-login">
            <p class="welcome">Welcome <?= $user ?></p>
        </div>
    </header>
    <?php
}

function getTopNav()
{
    $str = "
    <nav>
    <ul>
        <li><a href='vehicle.php'>Home</a></li>
        <li><a href='view.php'>View Guestbook</a></li>
        <li><a href='signup.php'>Sign Guestbook</a></li>";

    if (!isset($_SESSION['user'])) {
        $str .= "
            <li><a href='register.php'>Register</a></li>
            <li><a href='login.php'>Login</a></li>";
    } else {
        $str .= "
             <li><a href='logout.php'>Logout</a></li>";
    }
    $str .= "</ul></nav>";

    return $str;
}

function getFooter()
{
    return "<footer>&copy;2020 Christian Hur. I own this!</footer>";
}

function showGuestBook($handle, $table)
{
    ?>

    <table class="guestbook_table" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
            <?php
            if (isset($_SESSION['user'])){
            ?>
            <th>Actions</th>
            <?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = getAllRecords($handle, $table);
        $counter = 1;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?= $counter++; ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['comment'] ?></td>
                <?php
                if (isset($_SESSION['user'])){?>
                <td>
                    <ul>
                        <li><a href="edit.php?id=<?= $row['id'] ?>">Edit</a></li>
                        <li><a href="delete.php?id=<?= $row['id'] ?>">Delete</a></li>
                    </ul>
                </td>
                <?php } ?>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <?php
}

function showGuestBookForm()
{
    ?>
    <form name="guest_book" id="guest_book" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="guestbook_controls">
            <label for="name">Name:</label>
            <input name="name" id="name">
        </div>
        <div class="guestbook_controls">
            <label for="email">Email:</label>
            <input name="email" id="email">
        </div>
        <div class="guestbook_controls">
            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment"></textarea>
        </div>
        <div class="guestbook_controls">
            <input class="btn-submit" type="submit" name="submit">
            <input class="btn-reset" type="reset" name="reset" value="Start Over">
        </div>
    </form>
    <?php
}

function showEditForm($result)
{
    $row = mysqli_fetch_array($result);
    ?>
    <form name="guest_book" id="guest_book" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
        <div class="guestbook_controls">
            <label for="name">Name:</label>
            <input name="name" id="name" value="<?= $row['name'] ?>">
        </div>
        <div class="guestbook_controls">
            <label for="email">Email:</label>
            <input name="email" id="email" value="<?= $row['email'] ?>">
        </div>
        <div class="guestbook_controls">
            <label for="comment">Comment:</label>
            <textarea name="comment" id="name"><?= $row['comment'] ?></textarea>
        </div>
        <div class="guestbook_controls">
            <input class="btn-submit" type="submit" name="submit">
            <input class="btn-reset" type="reset" name="reset" value="Start Over">
        </div>
    </form>
    <?php
}

//Login form
function showLoginForm()
{
    ?>
    <form name="login_form" id="login_form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="login_controls">
            <label for="username">Username:</label>
            <input name="username" id="username" required>
        </div>
        <div class="login_controls">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="login_controls">
            <input class="btn-submit" type="submit" name="submit" value="Login">
            <input class="btn-reset" type="reset" name="reset" value="Start Over">
        </div>
    </form>
    <?php
}

//User Registration Form
function showRegistrationForm()
{
    ?>
    <form name="registration_form" id="registration_form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="registration_controls">
            <label for="username">Username:</label>
            <input name="username" id="username" required>
        </div>
        <div class="registration_controls">
            <label for="email">Email:</label>
            <input name="email" id="email" required>
        </div>
        <div class="registration_controls">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="registration_controls">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
        </div>
        <div class="registration_controls">
            <input class="btn-submit" type="submit" name="submit" value="Register">
            <input class="btn-reset" type="reset" name="reset" value="Start Over">
        </div>
    </form>
    <?php
}