<?php include('../1connection.php'); ?>

<div class="table-responsive">
    <table class="table table-striped v_center">
        <tr>

            <th>Name</th>
            <th>Image</th>
            <th>Joined Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $count1 = 0;
        $user = mysqli_query($con, "SELECT *  from account ") or die(mysqli_error($con));
        while ($rowuser = mysqli_fetch_object($user)) {
            $count1++;
        ?>
            <tr>
                <td><?php echo $rowuser->name; ?></td>
                <td>
                    <img alt="image" src="../img/user/<?php if ($rowuser->image == NULL) { ?>null.png<?php } else {
                                                                                                    echo $rowuser->image; ?><?php } ?>" style="aspect-ratio: 1" class="ratio-1x1 rounded-circle" width="35" data-toggle="tooltip" title="<?= $rowuser->name?>">
                </td>
                <td><?php echo $rowuser->datecreated; ?></td>
                <td>
                    <?php if ($rowuser->status == "blocked") { ?>
                        <div class="badge badge-success">Active</div>
                    <?php } else { ?>
                        <div class="badge badge-danger">Block</div>
                    <?php } ?>
                </td>
                <td>
                    <!--  <button type="submit" class="btn btn-secondary" formaction="">View</button> -->
                    <input type="submit" onclick="location.replace('viewcustomer.php?customerID=<?php echo $rowuser->accountID; ?>')" />
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php
    if ($count1 == 0) {

        echo "<center>";
        echo "<h1>No Data Available</h1>";
        echo "</center>";
    }

    ?>
</div>