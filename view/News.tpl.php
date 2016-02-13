<div class="container">

    <div class="row">

        <ul class="list-group">
            <?
            foreach($this->result as $row)
            {
                echo ' <li class="list-group-item"><a href="?action=show&id='.$row['id'].'"> '.$row['title'].'</a></li>';
            }
            ?>
        </ul>

    </div>
</div>
