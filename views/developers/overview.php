
<div class='col-10'>
<h1>Developers</h1>
<hr />
<a href='<?= APP_BASE_URL ?>/Developers/addForm'>Add die nieuwe developer</a>
    <table border=1>
            <tr>
              <th>
                Developer
              </th>
              <th>
                Update
              </th>
              <th>
                Delete
              </th>
            </tr>

<?php foreach($developer as $row){  ?>
      <tr>
        <td>
          <?= $row->developer ?>
        </td>
        <td>
          <a href='<?= APP_BASE_URL ?>/Developers/updateForm/<?= $row->developer_ID ?>'>Update Deze</a>
        </td>
        <td>
          <a href='<?= APP_BASE_URL ?>/Developers/delete/<?= $row->developer_ID ?>'>Hang Deze</a>
        </td>
        <?php } ?>
      </tr>


    </table>
</div>
