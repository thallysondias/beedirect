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
</style>

<!--Mensagem de Sucesso-->
<?php if(isset($_POST['be_submit']) && $chk):?>
  <div id="message" class="updated">
    <p><b>Motor de reserva atualizado!</b><br>
      <i>Booking Engine Updated</i>
    </p>
  </div>
<?php endif;?>

<div class="background-plugin">
  <div class="content-plugin">
    <form method="post" action="">
      <div class="passo-plugin">
        <div class="input-plugin">
          ID Omnibees
          <input type="text" name="q" value="<?php echo get_option('omnibees_id');?>"/>
        </div>
        <div class="input-plugin">
          Token
          <input type="text" name="token" value="<?php echo get_option('omnibees_token');?>"/>
        </div>
      </div>
      <input type="submit" name="be_submit" value="Guardar Alterações" class="button-primary" />
    </form>
  </div>
  <br>
</div>
