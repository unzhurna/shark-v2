<div class="panel-group" id="accordion">
	<?php if(empty($careers)) : ?>
		<h3>We have close yet..</h3>
	<?php else : ?>
		<?php $c = 1; ?>
		<?php foreach ($careers as $career) : ?>
		    <div class="panel panel-default">
		        <a data-toggle="collapse" data-parent="#accordion" href="<?php echo '#tab_'.$career['career_id']; ?>">
		            <div class="panel-heading">
		                <h4 class="panel-title"><?php echo $career['career_title']; ?></h4>
		            </div>
		        </a>
		        <div id="<?php echo 'tab_'.$career['career_id']; ?>" class="panel-collapse collapse <?php echo ($c == 1) ? 'in' : '' ?>">
		            <div class="panel-body">
		                <p><strong>Kualifikasi :</strong></p>
		                <?php $qualifications = explode('|', $career['career_qualifications']); ?>
		                <ul>
		                    <?php foreach ($qualifications as $qualification) : ?>
		                        <li><?php echo $qualification; ?></li>
		                    <?php endforeach; ?>
		                </ul>
		                <p><strong>Persyaratan :</strong></p>
		                <?php $skills = explode('|', $career['career_skills']); ?>
		                <ul>
		                    <ul>
		                        <?php foreach ($skills as $skill) : ?>
		                            <li><?php echo $skill; ?></li>
		                        <?php endforeach; ?>
		                    </ul>
		                </ul>
		                <div class="text-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default"><i class="fa fa-share-alt"></i> Share</button>
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu" role="menu" id="icon-share"></ul>
							</div>
							<a href="<?php echo site_url('apply_career/'.$career['career_slug']); ?>" class="btn btn-default"><i class="fa fa-upload"></i> Apply</a>
		                </div>
		            </div>
		        </div>
		    </div>
		    <?php $c++; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
