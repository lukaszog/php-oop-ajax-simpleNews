<?

foreach($this->result as $row)
{
    $tresc = $row['comment'];


}
?>
<div class='margin-bottom-1em overflow-hidden'>
    <div id='create-coment'>
        <p>Zmieniłem</p>
    </div>

    <div id='loader-image'><img src='images/loader.gif' width="20" height="20" /></div>
</div>

<!-- Comments Form -->
<div class="well">
    <h4>Edytuj komentarz: </h4>
    <form role="form" id="create-comment-form" action="#" method="post" novalidate="novalidate">
        <div class="form-group">
            <input class="form-control"  type="text" value="<?=$_SESSION['user'];?>" name="nick" placeholder="Nick">
            <input type="hidden" value="<?=htmlspecialchars($_GET['id']);?>" name="comm_id">

        </div>
        <div class="form-group">
            <textarea class="form-control" name="comment" rows="3"><?=$tresc;?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Aktualizuj</button>
    </form>
</div>

<hr>

<script>
    $(document).ready(function(){
        $('#create-coment').hide();
        $('#loader-image').hide();

    });
    $(function() {
        $("#create-comment-form").validate({

            rules: {
                nick: "required",
                comment: "required"
            },

            messages: {
                firstname: "Podaj nick",
                lastname: "Wpisz komentarz"

            },

            submitHandler: function(form) {

                $('#loader-image').show();
                $('#create-coment').show();

                console.log("Robie");

                $.post("comm.php?edit=yes", $(form).serialize())
                    .done(function(data) {

                        console.log(data);

                        $('#create-coment').show();

                        $('#read-products').hide();
                        $('#loader-image').hide();

                     });

                return false;
            }
        });

    });
</script>