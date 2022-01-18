<div class="container">
    <div class="row">
        <form action="?data=client&action=add" method="POST" class="col-sm-8 col-md-6 align-self-center pb-5">
            <h2>Ajouter un produit</h2>
            <div class="form-group py-2">
                <label class="form-label" for="nom-produit">Nom du produit </label>
                <input class="form-control" type="text" id="nom-produit" name="nom-produit" placeholder="Inscrivez le nom du produit à ajouter" required>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="prix-produit">Nom du produit </label>
                <input class="form-control" type="text" id="prix-produit" name="prix-produit" placeholder="Prix hors taxe" required>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="unite-produit">T.V.A.</label>
                <select class="form-control" type="text" id="tva-produit" name="tva-produit" aria-label="" required>
                    <option value="5.5" selected>5,5%</option>
                    <option value="20">20%</option>
                </select>   
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="unite-produit">Unité</label>
                <select class="form-control" type="text" id="unite-produit" name="unite-produit" aria-label="" required>
                    <option selected>Selectionner l'unité</option>
                    <option value="unite">unitaire</option>
                    <option value="h">à l'heure</option>
                    <option value="m²">volume (mètres carrés)</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>

        <h2>Tous les produits</h2>
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