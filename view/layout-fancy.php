<div id="teampage" class="row">
	<div class="medium-12 columns">

		<form id="teamfilter" name="teamfilter">

			<?php // Step One ?>
			<div id="drop-city" class="row">
				<label class="small-12 medium-4 columns">
					<input id="juan-tabo" name="location" type="radio" value="juan-tabo" />
					<span>Juan Tabo</span>
				</label>
				<label class="small-12 medium-4 columns">
					<input id="nob-hill" name="location" type="radio" value="nob-hill" />
					<span>Nob Hill</span>
				</label>
				<label class="small-12 medium-4 columns end">
					<input id="edo" name="location" type="radio" value="edo" />
					<span>Edo</span>
				</label>
				<label class="small-12 medium-4 medium-offset-2 columns">
					<input id="coors-bypass" name="location" type="radio" value="coors-bypass" />
					<span>Coors Bypass</span>
				</label>
				<label class="small-12 medium-4 columns end">
					<input id="paseo-del-norte" name="location" type="radio" value="paseo-del-norte" />
					<span>Paseo Del Norte</span>
				</label>
			</div>

			<?php // Step Two ?>
			<div id="next-step">
				<ul id="stylistSort">
					<li class="hair"><label>
						<input name="service_cat" type="radio" value="hair">Hair
					</label></li>
					<li class="nails"><label>
						<input name="service_cat" type="radio" value="nails">Nails
					</label></li>
					<li class="skin-body"><label>
						<input name="service_cat" type="radio" value="skin-body">Skin &amp; Body
					</label></li>
					<li class="leadership"><label>
						<input name="service_cat" type="radio" value="leadership">Leadership
					</label></li>
				</ul>
			</div>

			<?php // Final Step ?>
			<div id="last-step">
				<?php include('filter.php'); ?>
			</div>

		</form>
		
		<div id="displayTeam">
			<h4 class="archive-title text-center"><span></span></span>
			<h6 id="noitems">Sorry, none of our team members meet your selected criteria. Please try again.</h6>
			<div id="theteam" class="row"></div>
		</div>


	</div>
</div><br clear="all" />