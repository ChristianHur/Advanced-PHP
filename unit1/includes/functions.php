<?php
//Function utilities

function getTopNav()
{
    return "
    <nav>
    <ul>
        <li><a href='index.php'>Home</a></li>
        <li><a href='view.php'>View Guestbook</a></li>
        <li><a href='signup.php'>Sign Guestbook</a></li>
    </ul>
    </nav>
    ";
}

function getFooter()
{
    return "<footer>&copy;2020 Christian Hur. I own this!</footer>";
}

function showGuestBook($handle,$table){
    ?>

    <table class="guestbook_table" cellpadding="0" cellspacing="0" >
        <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $result = getAllRecords($handle,$table);
            $counter=1;
            while($row=mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><?= $counter++; ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['comment'] ?></td>
                <td>
                    <ul>
                        <li><a href="edit.php?id=<?= $row['id'] ?>">Edit</a></li>
                        <li><a href="delete.php?id=<?= $row['id'] ?>">Delete</a></li>
                    </ul>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>

<?php
}

function showGuestBookForm(){
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
            <textarea name="comment" id="name"></textarea>
        </div>
        <div class="guestbook_controls">
            <input class="btn-submit" type="submit" name="submit">
            <input class="btn-reset" type="reset" name="reset" value="Start Over">
        </div>
    </form>
<?php
}

function showEditForm($result){
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