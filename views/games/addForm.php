
<div class='col-10'>
<form action='<?= APP_BASE_URL ?>/Games/Add' method='POST'>
  <h1>Add nieuwe game</h1>
  Game: <input type='text' name='game'/><br />
  Description: <input type='text' name='description'/><br />
  Price: <input type='number' step=0.01 name='price'/><br />
  Genre: <select name='genre_id'>
  <?php foreach($genres as $row){ ?>
      <option value='<?= $row->genre_ID ?>'>
        <?= $row->genre ?>
      </option>
  <?php } ?>
  </select><br />
  Developer: <select name='developer_id'>
  <?php foreach($developers as $row){ ?>
      <option value='<?= $row->developer_ID ?>'>
        <?= $row->developer ?>
      </option>
  <?php } ?>
  </select><br />
  <input type='submit' name='submit' value='Bijwerken' />
</form>
</div>
