<?php /**
if(class_exists('iDBug')){
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
	$debug = new iDBug();
	$debug->debug('services_json',$services_json);
}
/**/

?>
<div id="" class="">
	<form id="nl-form" class="nl-form">
		Im
		<select>
			<option value="" selected>in&hellip;</option>
			<?php 
			if(!empty($countriesArray)){
				
				foreach ($countriesArray as $country) {
					/**
					if(class_exists('iDBug')){
						$debug = new iDBug();
						$debug->debug('country',$country);
					}
					/**/
					?>
					<option value="<?php echo $country->ID;?>" data-code="<?php echo $country->Code;?>"><?php echo $country->Name;?></option>
					<?php
				}
			};?>
		</select>
		<br />somewhere in
		<select>
			<option value="1" selected>...this province</option>
			<?php 
			if(!empty($ProvincesArray)){
				foreach ($ProvincesArray as $province) {
					/**
					if(class_exists('iDBug')){
						$debug = new iDBug();
						$debug->debug('province',$province);
					}
					/**/
					?>
					<option value="<?php echo $province->ID;?>" data-code="<?php echo $province->Code;?>"><?php echo $province->Name;?></option>
					<?php
				}
			};?>
		</select>
		looking for a taxi
		<br />to
		<select>
			<option value="1" selected>...Soweto?</option>
		</select>
		<div class="nl-submit-wrap">
			<button class="nl-submit" type="submit">Find</button>
		</div>
		<div class="nl-overlay"></div>
	</form>
</div>
<?php /** 
<div data-role="fieldcontain">
	<fieldset id="input-localize" data-role="controlgroup">    
		<input type="text" class="hidden user-input-location" />
	</fieldset>
	<fieldset id="home-localize" data-role="controlgroup">
		<label for="select-choice-country" class="assistive-text">Country</label>
		<select name="select-choice-country" id="select-choice-country">
			<option value="ZA" data-placeholder="true">Select a Country:</option>
			<?php 
			if(!empty($countriesArray)){
				
				foreach ($countriesArray as $country) {
					/**
					if(class_exists('iDBug')){
						$debug = new iDBug();
						$debug->debug('country',$country);
					}
					/**
					?>
					<option value="<?php echo $country->ID;?>" data-code="<?php echo $country->Code;?>"><?php echo $country->Name;?></option>
					<?php
				}
			}
			
			?>
		</select>

		<label for="select-choice-province" class="assistive-text">Province</label>
		<select name="select-choice-province" id="select-choice-province">
			<option data-placeholder="true">Select a Province:</option>
            <?php 
			if(!empty($ProvincesArray)){
				
				foreach ($ProvincesArray as $province) {
					/**
					if(class_exists('iDBug')){
						$debug = new iDBug();
						$debug->debug('province',$province);
					}
					/**
					?>
					<option value="<?php echo $province->ID;?>" data-code="<?php echo $province->Code;?>"><?php echo $province->Name;?></option>
					<?php
				}
			}
			
			?>
		</select>
		<br /><br />
		<hr />
		<label for="select-choice-month" class="assistive-text">Destintation</label>
		<select name="select-choice-destination" id="select-choice-destination" style="width:95%; margin:0 auto;">
			<option data-placeholder="true">Destintation:</option>
		</select>
		<noscript>
			<label for="select-choice-month" class="assistive-text">Destintation</label>
			<select name="select-choice-destination" id="select-choice-destination">
				<option data-placeholder="true">Destintation:</option>
			</select>
		</noscript>
	</fieldset>
</div>
<?php /**/?>
