<?php /**
if(class_exists('iDBug')){
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
	$debug = new iDBug();
	$debug->debug('services_json',$services_json);
}
/**/
?>
<p>Welcome! This is a demo for an applicaton that shows you South African Taxi routes based on your current location and desired destination.</p>

<div data-role="fieldcontain">
	<fieldset id="home-localize" data-role="controlgroup">    
		<label for="select-choice-country" class="assistive-text">Country</label>
		<select name="select-choice-country" id="select-choice-country">
			<option value="ZA">South Africa</option>
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
					/**/
					?>
					<option value="<?php echo $province->ID;?>" data-code="<?php echo $province->Code;?>"><?php echo $province->Name;?></option>
					<?php
				}
			}
			
			?>
		</select>
    
       <label for="select-choice-location" class="assistive-text">Current Location</label>
		<select name="select-choice-location" id="select-choice-location">
			<option data-placeholder="true">Your Current Location:</option>
		</select>
		<br />
		<hr />
		<label for="select-choice-month" class="assistive-text">Destintation</label>
		<select name="select-choice-destination" id="select-choice-destination">
			<option data-placeholder="true">Destintation:</option>
		</select>
	</fieldset>
</div>
