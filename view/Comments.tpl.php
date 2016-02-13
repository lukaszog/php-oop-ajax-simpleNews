<div class="container">

	<div class="row">
		<?
		foreach($this->result as $row) {
			?>
		    <div class="col-sm-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong><?= $row['user']; ?></strong> <span class="text-muted"><?= $row['create_time']; ?></span>
					</div>
					<div class="panel-body">
						<?= $row['comment']; ?>
					</div><!-- /panel-body -->


					<?
					if($_SESSION['login_id'] == $row['user_id'])
					{
						?>
						<div class="panel-body">
							 <a href="?action=editcomm&id=<?=$row['id'];?>">Edytuj</a>
						</div><!-- /panel-body --><?
					}
					?>




				</div><!-- /panel panel-default -->
			</div><!-- /col-sm-5 -->

			<?
		}
		?>
	</div>


</div>
