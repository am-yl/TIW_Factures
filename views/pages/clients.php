<div class="container">
    <div class="row">
        <form action="?data=client&action=add" method="POST" class="col-sm-10 col-md-8 align-self-center pb-5">
            <h2>Ajouter un client</h2>
            <div class="form-group py-2">
                <label class="form-label" for="nom-client">Nom du client </label>
                <input class="form-control" type="text" id="nom-client" name="nom-client" placeholder="Inscrivez le nom du client à ajouter" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
        <h2>Liste des clients</h2>
        <table class="table table-hover pt-2 col-sm-10 col-md-8 ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $clients = get_all_clients();
                    foreach($clients as $client) :
                ?>
                <tr>
                    <td>
                        <?= $client['name']?>
                    </td>
                    <td>
                    <a href="/?data=client&action=view&cid=<?= $client['id'] ?>" class="btn btn-primary">voir</a>
                        <a href="/?data=client&action=delete&cid=<?= $client['id'] ?>" class="btn btn-danger">supprimer</a>
                    </td>
                </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>