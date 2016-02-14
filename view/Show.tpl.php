<?

foreach($this->result as $row)
{
    $tytul = $row['title'];
    $autor = $row['user'];
    $tresc = $row['text'];
    $data = $row['create_date'];

}
?>



<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>
            <?=$tytul;?>
            </h1>

            <!-- Author -->
            <p class="lead">
               Autor: <?=$autor;?></a>
            </p>
            <hr>
            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span>
               <?=$data;?>
            </p>

            <!-- Post Content -->
            <p class="lead">
               <?=$tresc;?>
            </p>

            <hr>

            <p class="lead">
                <div id="page-content"></div>
            </p>

            <div class='margin-bottom-1em overflow-hidden'>
                <div id='create-coment'>
                    <p>Dodałem</p>
                </div>

                <div id='loader-image'><img src='images/loader.gif' width="20" height="20" /></div>
            </div>

             <div class="well">
                <h4>Zostaw komentarz: </h4>
                <form role="form" id="create-comment-form" action="#" method="post" novalidate="novalidate">
                    <div class="form-group">
                        <input class="form-control"  type="text" value="<?=$_SESSION['user'];?>" name="nick" placeholder="Nick">
                        <input type="hidden" value="<?=htmlspecialchars($_GET['id']);?>" name="newsid">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="comment" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Wyślij</button>
                </form>
            </div>
            <hr>
        </div>
</div>



<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<script type="text/javascript">

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

    function showComments(){

        var id = getUrlParameter('id');

         $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('index.php?action=showComment&id='+id, function(){
                $('#loader-image').hide();
                $('#page-content').fadeIn('slow');
            });
        });
    }


    $(document).ready(function(){
        $('#create-coment').hide();
        $('#loader-image').hide();

    });


    $(function() {

        showComments();

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

                $.post("comm.php", $(form).serialize())
                    .done(function(data) {

                        console.log(data);

                        $('#create-coment').show();

                        $('#read-products').hide();
                        $('#loader-image').hide();

                        showComments();
                    });

                return false;
            }
        });

    });



</script>
