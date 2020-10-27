<?php
if (isset($_FILES['img_user'])) {
    var_dump($_FILES['img_user']);
}
?>
<form action="" method="post" class="border rounded bg-light shadow"  enctype="multipart/form-data">
<br>
    <div class="form-group pl-3 pr-3">
        <label><b>Chọn Ảnh Khác</b></label>
        <input type="file" name="img_user" class="form-control"required>
        <input type="submit" value="xem" >
    </div>
</form>

