<input type="hidden" name="id" id="id">
<div class="alert alert-danger" style='display:none;' id="msg-alert-check-pass">
    <span></span>
</div>
<div class="form-group">
    <label for="nama" class="bmd-label-floating">Nama User</label>
    <input type="text" name="nama" id="nama" required class="form-control">
</div>
<div class="form-group">
    <label for="username" class="bmd-label-floating">Username</label>
    <input type="text" name="username" id="username" required class="form-control">
</div>
<div class="form-group">
    <label for="email" class="bmd-label-floating">Email</label>
    <input type="email" name="email" id="email" required class="form-control">
</div>
<div class="form-group">
    <label for="password" class="bmd-label-floating">Password</label>
    <input type="password" name="password" id="password" required class="form-control" onkeyup="checkPass();">
</div>
<div class="form-group">
    <label for="password" class="bmd-label-floating">Confirm Password</label>
    <input type="password" id="confirm-password" required class="form-control" onkeyup="checkPass();">
</div>
<div class="form-group">
    <label for="Staff" class="bmd-label-floating">Staff</label>
    <input type="Staff" name="Staff" id="Staff" required class="form-control">
</div>
