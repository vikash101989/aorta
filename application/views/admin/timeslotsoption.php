<option>Time Slots</option>
<?php if(!empty($timeslots)) { 
    foreach($timeslots as $timeslot) { ?>
        <option><?php echo $timeslot; ?></option>
<?php  }  } ?>