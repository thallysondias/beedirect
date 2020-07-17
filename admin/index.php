<?php
global $chk;
if(isset($_POST['be_submit'])){
    be_opt();
}
function be_opt(){
    $beid = $_POST['q'];
    $token = $_POST['token'];

    global $chk;
    if( get_option('omnibees_id') != trim($beid)){
      $chk = update_option( 'omnibees_id', trim($beid));
    }
    if( get_option('omnibees_token') != trim($token)){
      $chk = update_option( 'omnibees_token', trim($token));
  }
}
?>

<!--Sucess Messsage-->
<?php if(isset($_POST['be_submit']) && $chk):?>
  <div id="message" class="updated">
    <p><b>Atualizado!</b></p>
  </div>
<?php endif;?>

<div class="wrap">
  <h1>BeeDirect by Omnibees</h1>

  <form method="post" action="">

    <table class="form-table">
      <tr>
        <td class="title">Omnibees Token</td>
        <td class="token-input"><input type="text" name="token" value="<?php echo get_option('omnibees_token');?>"/></td>
      </tr>
    </table>

    <input type="submit" name="be_submit" value="Guardar Alterações" class="button-primary" />
  </form>
</div>
