
<div class='col-10'>
<h1>Genres</h1>
<hr />
<a href='<?= APP_BASE_URL ?>/Genres/addForm'>Add die nieuwe genre</a>
    <table border=1>
            <tr>
              <th>
                Genre
              </th>
              <th>
                Update
              </th>
              <th>
                Delete
              </th>
            </tr>

<?php foreach($genre as $row){  ?>
      <tr>
        <td>
          <?= $row->genre ?>
        </td>
        <td>
          <a href='<?= APP_BASE_URL ?>/Genres/updateForm/<?= $row->genre_ID ?>'>Update Deze</a>
        </td>
        <td>
          <a href='<?= APP_BASE_URL ?>/Genres/delete/<?= $row->genre_ID ?>'>Hang Deze</a>
        </td>
        <?php } ?>
      </tr>


    </table>
</div>
