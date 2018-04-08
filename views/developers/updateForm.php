
<div class='col-10'>
  <h1>Update Developer</h1>
  <?php foreach($developer as $row){?>
    <form action='<?= APP_BASE_URL ?>/Developers/update/<?= $row->developer_ID ?>' method='POST'>
  Developer: <input type='text' name='developer' value='<?= $row->developer ?>'><br />
  <input type='submit' name='submit' value='Bijwerken' />
</form>
<?php } ?>
</div>
