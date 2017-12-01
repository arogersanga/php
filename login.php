<?php
  require_once 'form_register.php';
  require_once 'form_find_user.php';
  $salt= 'sdnbfkhjsdvfjsuuusksld';
  if(!empty($_POST) && isset($_POST['submit'])){
    $errors = checkForm($_POST);

    if(count($errors) == 0){
      $res = findUser($_POST['email'], $_POST['password']);
      if($res)
      {
        echo "vous êtes connecté";
      }
      else {
        echo "Identifiants ne correspondent pas";
      }
    }
  }
?>



<form class="" action="" method="POST">
  <div class="form-group">
    <label for="email" >Email</label>
    <input
      name="email"
      type="text"
      class="form-control <?php if(isset($errors['email'])){ echo 'is-invalid';} ?>"
      id="email"
      placeholder="Enter email"
      value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"
    >
    <?php if(isset($errors['email'])) { echo displayErrors($errors['email']); } ?>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input name="password" type="password" class="form-control <?php if(isset($errors['password'])){ echo 'is-invalid';} ?>" id="password" placeholder="Password">
    <?php if(isset($errors['password'])) { echo displayErrors($errors['password']); } ?>
  </div>
  <input type="submit" name="submit" value="Se connecter">
</form>
