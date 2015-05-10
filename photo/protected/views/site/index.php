<div class="container-fluid" style="margin-top:150px;">
	<div class="row-fluid">
		<div class="span12">
			<?php
			$number = 0;
			$n = 2;
			while($n--) {
				$m = 3;
				?>
				<ul class="thumbnails">
					<?php
					while($m--) {
						if(empty($dynamic[$number]))
						{
							continue;
						}
						?>
						<li class="span4">
							<div class="thumbnail">
								<div class="caption">
									<h3>
										<?php
										echo $dynamic[$number]['nickname'];
										?>
									</h3>

									<p>
										<?php
										echo $dynamic[$number]['content'];
										?>
									</p>

									<p>
										<a href="index.php?r=switch/dynamic/detail&id=<?php echo $dynamic[$number]['id'].'&'.$dynamic[$number]['nickname'];?>" ><img alt="300x200" src="<?php echo $dynamic[$number]['pic_path'];?>" style="max-height:300px; max-width:300px;"/></a>
									</p>

									<p>
										<a class="btn btn-primary" href="index.php?r=switch/dynamic/praise&id=<?php echo $dynamic[$number]['id'];?>">赞(<?php echo $dynamic[$number]['praise'];?>)</a> <a class="btn" href="index.php?r=switch/dynamic/boo&id=<?php echo $dynamic[$number]['id']?>">踩(<?php echo $dynamic[$number]['boo'];?>)</a>
									</p>
								</div>
							</div>
						</li>
					<?php
						$number = $number+1;
					}
					?>
				</ul>
			<?php
			}
			?>
		</div>
	</div>
</div>