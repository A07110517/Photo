<?php
$role = Yii::app()->session['user_role'];
$uid = Yii::app()->session['user_id'];
?>
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
										<a href="index.php?r=switch/user/index&uid=<?php echo $dynamic[$number]['uid'];?>">
										<?php
										echo $dynamic[$number]['nickname'];
										?>
										</a>
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
										<a class="btn btn-primary" href="index.php?r=switch/dynamic/praise&id=<?php echo $dynamic[$number]['id'];?>">赞(<?php echo $dynamic[$number]['praise'];?>)</a>
										<a class="btn" href="index.php?r=switch/dynamic/boo&id=<?php echo $dynamic[$number]['id']?>">踩(<?php echo $dynamic[$number]['boo'];?>)</a>
										<?php
										if($role == 0 || $dynamic[$number]['uid'] == $uid) {
											?>
											<a class="btn btn-danger"
											   href="index.php?r=switch/dynamic/delDynamic&id=<?php echo $dynamic[$number]['id']?>" onclick="return confirm('确认删除?');">删除</a>
										<?php
										}
										?>
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

</div>
<div class="page">
	<?php $this->widget('CLinkPager', array(
			'header'=>'',
			'firstPageLabel'=>'首页',
			'lastPageLabel'=>'末页',
			'prevPageLabel'=>'上一页',
			'nextPageLabel'=>'下一页',
			'pages'=>'$pages',
			'maxButtonCount'=>10,
			'pages' => $pages
		)
	); ?>
</div>