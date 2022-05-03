<div class="container">
    <div class="row">

        <div class="col-md-6 mx-auto">
        
        <?php echo form_error('nome', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('snome', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('senha', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('conf_senha', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('telefone', '<div class="alert alert-danger">', '</div>'); ?>


            <form class="text-center border border-light p-5" method="POST">
               <div class="form-row mb-4">
                    <div class="col">

                        <input type="text" id="nome" name="nome" value="<?= set_value('nome') ?>" class="form-control" placeholder="Nome">
                    </div>
                    <div class="col">

                        <input type="text" [id="snome"] name="snome" value="<?= set_value('snome') ?>" class="form-control" placeholder="Sobrenome">
                    </div>
                </div>


                <input type="email" id="email" name="email" value="<?= set_value('email') ?>" class="form-control mb-4" placeholder="E-mail">


                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                <br/>
                <input type="password" id="conf_senha" name="conf_senha" class="form-control" placeholder="Confirmar a senha" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                <br/>
                <input type="text" id="telefone" name="telefone" value="<?= set_value('telefone') ?>" class="form-control" placeholder="Telefone" aria-describedby="defaultRegisterFormPhoneHelpBlock">
                
                <button class="btn btn-info my-4 btn-block" type="submit">Enviar</button>
              
                <hr>

                
            </form>
            
        </div>

    </div>

</div>