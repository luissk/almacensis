<?php
if(isset($user) && $user){
    //echo "<pre>"; print_r($user); echo "</pre>";
    $idusuario = $user['idusuario'];
    $usuario   = $user['usuario'];
    $password  = $user['password'];
    $nombres   = $user['nombres'];
    $dni       = $user['dni'];
    $status    = $user['status'];
    $idtipousu = $user['idtipousu'];
    $tipo      = $user['tipo'];

    $title_head = "EDITAR USUARIO";
    $btnUsuario = "MODIFICAR USUARIO";
}else{

    $idusuario = "";
    $usuario   = "";
    $password  = "";
    $nombres   = "";
    $dni       = "";
    $status    = "";
    $idtipousu = "";
    $tipo      = "";

    $title_head = "NUEVO USUARIO";
    $btnUsuario = "GUARDAR USUARIO";
}
?>


<section class="content bg-white">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12">
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $title_head?> &nbsp;<a href="usuarios" class="btn btn-danger btn-sm" role="button">Regresar</a></h3>
                    </div>
                    <form role="form" id="frmUsuario">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-3 col-lg-2">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required value="<?php echo $usuario?>">
                            </div>
                            <?php
                            if($idtipousu > 1 || $idtipousu == ''){
                            ?>
                            <div class="form-group col-sm-3 col-lg-2">
                                <label for="tusuario">Tipo de Usuario</label>
                                <select name="tusuario" id="tusuario" class="form-control">
                                    <?php
                                    foreach($tiposUsuario as $tu){
                                        $idtu     = $tu['idtipousu'];
                                        $tutipo = $tu['tipo'];

                                        if($idtu > 1){
                                            $tuSelected = $idtipousu == $idtu ? 'selected' : '';
                                            echo "<option value=$idtu $tuSelected>$tutipo</option>";
                                        }
                                        
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="form-group col-sm-3 col-lg-2">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" <?php echo $password == '' ? 'required': ''?> >
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                                <label for="nombres">Nombres</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" required value="<?php echo $nombres?>">
                            </div>
                            <div class="form-group col-sm-3 col-lg-2">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni" name="dni" maxlength="8" required value="<?php echo $dni?>">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-right">
                        <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $idusuario?>">
                        <button type="submit" class="btn btn-primary" id="btnUsuario"><?php echo $btnUsuario?></button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>
        </div>
    </div>
</section>

<script>
$(function(){
    $("#frmUsuario").on("submit", function(e){
        e.preventDefault();
        let btnHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>',
            textBtn = $('#btnUsuario').text();
        $("#btnUsuario").attr('disabled', 'disabled');
        $("#btnUsuario").html(`${btnHTML} Guardando`);
        $.ajax({
            method: 'POST',
            url: 'usuario/saveUpdateUsuario',
            data: $(this).serialize(),
            success: function(datos){
                console.log(datos);
                let data = JSON.parse(datos);
                if(data.err != ""){
                    swal_alert('Atención', data.err, 'info', 'Aceptar');
                    $("#btnUsuario").removeAttr('disabled');
                    $("#btnUsuario").text(textBtn);
                }else{                    
                    location.href='usuarios';
                }
            }
        });
    })
});
</script>