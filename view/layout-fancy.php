<div id="teampage" class="row">
	<div class="medium-12 columns">

		<form id="teamfilter" name="teamfilter">

			<?php // Step One ?>
			<div id="drop-city" class="row">
				<?php include('filter-location.php'); ?>
			</div>

			<?php // Step Two ?>
			<div id="next-step">
				<?php include('filter-skills.php'); ?>
			</div>

			<?php // Final Step ?>
			<div id="last-step">
				<?php include('filter-experience.php'); ?>
			</div>

		</form>
		
		<div id="displayTeam">
			<h4 class="archive-title text-center"><span></span></span>
			<h6 id="noitems">Sorry, none of our team members meet your selected criteria. Please try again.</h6>
			<div id="theteam" class="row" data-featherlight-gallery data-featherlight-filter="a.popup"></div>
		</div>


	</div>
</div><br clear="all" />