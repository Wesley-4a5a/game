
<div class='col-10'>
  <?php if($_SESSION['role'] === 'admin'){ ?>
  <h1>Update GaME GVD</h1>
  <?php foreach($game as $row){ $developerid = $row->developer_ID;?>
    <form action='<?= APP_BASE_URL ?>/Games/update/<?= $row->game_ID ?>' method='POST'>
  Game: <input type='text' name='game'/ value='<?= $row->game ?>'><br />
  Description: <input type='text' name='description' value='<?= $row->description ?>'/><br />
  Price: <input type='number' step=0.01 name='price' value='<?= $row->price ?>'/><br />
  Genre: <select name='genre_id'>
  <?php foreach($genres as $row){  ?>
      <option value='<?= $row->genre_ID ?>'>
        <?= $row->genre ?>
      </option>
  <?php } ?>
  </select><br />
  Developer: <select name='developer_id'>
  <?php foreach($developers as $row){
    var_dump($developerid); ?>
      <option value='<?= $row->developer_ID ?>' <?php if($developerid == $row->developer_ID) {?> selected<?php } ?>>
        <?= $row->developer ?>
      </option>
  <?php } ?>
    </select><br />
  <input type='hidden' name='old_genre_id' value='<?= $singleGenre[0]->genre_ID ?>' />
  <input type='submit' name='submit' value='Bijwerken' />
<?php } ?>
</form>
<?php }else{
  echo '<h1>U heeft geen toegang tot deze pagina</h1>';
}
?>
</div>
