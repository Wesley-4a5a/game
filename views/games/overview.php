<h1>Games</h1>
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
        <?php } ?>
      </tr>


    </table>
