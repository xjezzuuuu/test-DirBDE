<div class="container">
    <div class="row">
        <div class="col-12 ">
            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Fecha de registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allUsers as $user) : ?>
                            <tr>
                                <th scope="row"><?=$user['id']?></th>
                                <td><?=$user['nombre']?></td>
                                <td><?=$user['email']?></td>
                                <td><?=$user['fecha_registro']?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>