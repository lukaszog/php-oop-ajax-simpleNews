<?

foreach($this->result as $row)
{
    $tresc = $row['comment'];


}
?>

<!-- Comments Form -->
<div class="well">
    <h4>Edytuj komentarz: </h4>
    <form role="form" id="create-comment-form" action="#" method="post" novalidate="novalidate">
        <div class="form-group">
            <input class="form-control"  type="text" value="<?=$_SESSION['login_user'];?>" name="nick" placeholder="Nick">
            <input type="hidden" value="<?=htmlspecialchars($_GET['id']);?>" name="newsid">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="comment" rows="3"><?=$tresc;?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Aktualizuj</button>
    </form>
</div>

<hr>