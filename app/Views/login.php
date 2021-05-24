<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row mt-5">
  <div class="col-6">
    <h1>World's Rank Game</h1>
    <br>
    <form action="/login/signin" method="POST">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="usernameHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" >Password</label>
        <input type="password" class="form-control" id="pass" name="pass">
      </div>
      <button type="submit" class="btn btn-primary">Log In</button>
    </form>
    <p>Belum punya akun? Daftar <a href="/registration/index">di sini</a></p>
  </div>
</div>

<?= $this->endSection(); ?>
