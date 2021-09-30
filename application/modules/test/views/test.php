<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<h1>Test page</h1>
<table>

    <?php foreach ($tests as $test) : ?>
        <tr>
            <th>
                Name
            </th>
            <th>
                Public
            </th>
            <th>
                Delete
            </th>
        </tr>
        <tr>
            <td>
                <?= $test['name'] ?>
            </td>
            <td>
                <?= $test['public_flag'] == 1 ? 'Yes' : 'No' ?>
            </td>
            <td>
                <?= $test['delete_flag'] == 1 ? 'Yes' : 'No' ?>
            </td>

        </tr>
    <?php endforeach ?>
</table>