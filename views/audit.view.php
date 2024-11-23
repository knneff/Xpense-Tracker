<?php require('partials/head.php') ?>

<!-- <div>Audit Log Here</div> -->
 
<div class="w p-5">
    <table class="textGray border border-one border-gray-50">
        <thead class="font-bold text-center">
            <tr>
                <td class='border'>Time</td>
                <td class='border'>Table Name</td>
                <td class='border'>Action Type</td>
                <td class='border'>New Value</td>
                <td class='border'>Old Value</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($auditLog as $log) {
                echo "<tr> 
                <td class='border'> {$log['actionTimestamp']} </td>
                <td class='border'> {$log['tableName']} </td>
                <td class='border'> {$log['actionType']} </td>
                <td class='border'> {$log['newValues']} </td>
                <td class='border'> {$log['oldValues']} </td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
</div>



<?php require('partials/footer.php') ?>