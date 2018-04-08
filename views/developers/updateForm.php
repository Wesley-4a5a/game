<?php if(ISSET($developer)){
  $title = 'Update Developer';
  $developerName = $developer[0]->developer;
  $developerAction = APP_BASE_URL . '/Developers/update/' . $developer[0]->developer_ID;
}
else{
  $title = 'Add Developer';
  $developerName = '';
  $developerAction = APP_BASE_URL . '/Developers/Add';
}?>

<div class='col-10'>
  <h1><?= $title; ?></h1>
    <form action='<?= $developerAction ?>' method='POST'>
  Developer: <input type='text' name='developer' value='<?= $developerName ?>'>
  <br />
  <input type='submit' name='submit' value='Bijwerken' />
</form>
</div>
