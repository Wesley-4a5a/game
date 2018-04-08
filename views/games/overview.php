
<div class='col-10'>
<h1>Games</h1>
<hr />
<a href='<?= APP_BASE_URL ?>/Games/addForm'>Add die nieuwe game</a>
    <table border=1>
            <tr>
              <th>
                Game
              </th>
              <th>
                Developer
              </th>
              <th>
                Prijs
              </th>
              <th>
                Opmerking
              </th>
              <th>
                Genre
              </th>
              <?php if($_SESSION['role'] === 'admin'){ ?>
                <th>
                  Update
                </th>
                <th>
                  Delete
                </th>
            <?php  }?>

            </tr>

<?php foreach($game as $row){  ?>
      <tr>
        <td>
          <?= $row->game ?>
        </td>
        <td>
          <?= $row->developer ?>
        </td>
        <td>
          <?= $row->price ?>
        </td>
        <td>
          <?= $row->description ?>
        </td>
        <td>
          <?= $row->ALLEKUTGENRESBIJELKAAR ?>
        </td>
        <?php if($_SESSION['role'] === 'admin'){ ?>
        <td>
          <a href='<?= APP_BASE_URL ?>/Games/updateForm/<?= $row->game_ID ?>'>Update Deze</a>
        </td>
        <td>
          <a href='<?= APP_BASE_URL ?>/Games/delete/<?= $row->game_ID ?>'>Hang Deze</a>
        </td>

          <?php  }
         } ?>
      </tr>


    </table>
</div>
