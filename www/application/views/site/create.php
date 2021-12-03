<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <h1>Crear usuario</h1>
            <form class="needs-validation" novalidate method="POST" action="<?= base_url() ?>store">
                
                <div class="alert alert-danger <?php if(!validation_errors()):?>d-none<?php endif ?>">
                    <?php echo validation_errors(); ?>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" required>
                    <div class="invalid-feedback">
                        Por favor ingrese un nombre.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" name="email" required>
                    <div class="invalid-feedback">
                        Por favor ingrese un email valido.
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>