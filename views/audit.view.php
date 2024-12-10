<?php require('partials/bodyNoHeader.php') ?>

<!--  -->
<div class="textGray font-bold text-2xl sm:text-4xl flex pb-2 mb-4 border-b border-b-gray-400">
    <?= $title ?>
</div>

<div class="">
    <table class="textGray border border-one border-gray-50">

        <!-- Headers -->
        <thead class="font-bold text-center tlGreen2">
            <tr>
                <td class='border'>Time</td>
                <td class='border'>Table Name</td>
                <td class='border'>Action Type</td>
                <td class='border'>New Value</td>
                <td class='border'>Old Value</td>
            </tr>
        </thead>

        <!-- ROWS / DATA-->
        <tbody class='tlGreen'>
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

<?php require('partials/footerContent.php') ?>
<?php require('partials/footer.php') ?>