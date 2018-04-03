
<div class='col-10'>
<form action='<?= APP_BASE_URL ?>/Games/Update' method='POST'>
  <h1>Update GaME GVD</h1>
  <?php foreach($game as $row){ $developerid = $row->developer_ID; ?>
  Game: <input type='text' name='game'/ value='<?= $row->game ?>'><br />
  Description: <input type='text' name='description' value='<?= $row->description ?>'/><br />
  Price: <input type='number' step=0.01 name='price' value='<?= $row->price ?>'/><br />
  Genre: <select>
  <?php foreach($genres as $row){ ?>
      <option value='<?= $row->genre_ID ?>'>
        <?= $row->genre ?>
      </option>
  <?php } ?>
  </select><br />
  Developer: <select name='developer_id'>
  <?php foreach($developers as $row){
    var_dump($developerid); ?>
      <option value='<?= $row->developer_ID ?>' <?php if($developerid == $row->developer_ID) { echo 'yay'; ?> selected<?php } ?>>
        <?= $row->developer ?>
      </option>
  <?php } ?>
    </select><br />
  <input type='submit' name='submit' value='Bijwerken' />
<?php } ?>
</form>
</div>
