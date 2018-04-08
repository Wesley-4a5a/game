
<div class='col-10'>
  <h1>Update Genre</h1>
  <?php foreach($genre as $row){?>
    <form action='<?= APP_BASE_URL ?>/Genres/update/<?= $row->genre_ID ?>' method='POST'>
  Genre: <input type='text' name='genre' value='<?= $row->genre ?>'><br />
  <input type='submit' name='submit' value='Bijwerken' />
</form>
<?php } ?>
</div>
