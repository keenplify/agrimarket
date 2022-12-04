<label>House No.</label>
<input type="text" class="form-control" id="" name="no" required>
<div class="form-group">
    <label>Region</label>
    <select id="region" class="form-control" name="region" required>
        <option>Region IV-A</option>
    </select>
</div>
<div class="form-group">
    <label>Province</label>
    <select id="province" class="form-control" name="province" required>
        <option>Laguna</option>
    </select>
</div>
<div class="form-group">
    <label>City / Municipalities</label>
    <select id="city" class="form-control" name="city" required>
       <?php 
            $root = realpath($_SERVER["DOCUMENT_ROOT"]);
            include "$root/components/municipalities-options.php";
        ?>
    </select>
</div>
<div class="form-group">
    <label>Barangay</label>
    <input id="barangay" class="form-control" name="barangay" required></input>
</div>