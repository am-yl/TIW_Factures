<div class="container">
    <div class="row">
        <h1>Gestion de la facture : <span class="fw-bold"><?=$facture['name'] ?></span></h1>

        <form method="POST" class="pb-4" action="/?data=facture&action=edit">
            <div class="form-groupe pb-2">
                <label class="form-label" for="nom-facture">Modifier le nom de la facture :</label>
                <input type="text" class="form-control"  required name="nom-facture" id="nom-facture" value="<?=$facture['name'] ?>">
            </div>
            <input type="hidden" name="fid" value="<?= $facture['id'] ?>">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="/?data=facture&action=list" class="btn btn-dark">Retourner à la liste des factures</a>
        </form>

        <form action="?data=facture&action=add_pdt" method="POST" class="col-sm-8 col-md-6 align-self-center pb-5">
            <h2>Ajouter un produit</h2>
            <div class="form-group py-2">
                <label class="form-label" for="pid">Produit</label>
                <select class="form-control" type="text" id="pid" name="pid" aria-label="" required>
                    <option selected>Selectionner un produit</option>
                    <?php foreach($produits as $produit) : ?>
                    <option value="<?=$produit['id']?>"><?=$produit['name']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="q-produit">Quantité </label>
                <input class="form-control" type="number" max="100" id="q-produit" name="q-produit" placeholder="Quantité" required>
            </div>
            <input type="hidden" name="fid" value="<?= $facture['id'] ?>">
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>

        <h2>Factures</h2>
        <table class="table table-hover pt-2 col-sm-10 col-md-8 ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nom du produit</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Unite</th>
                    <th scope="col">Prix H.T.</th>
                    <th scope="col">T.V.A.</th>
                    <th scope="col">Prix TTC</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $res = 0;
                    foreach($facprods as $facprod) :
                    $prod = get_produit($facprod['id_produit']);
                    $calc = $facprod['quantite'] * ($prod['prix'] + (($prod['prix'] * $prod['tva']) / 100));
                    $res = $res+$calc;
                    ?>
                <tr>
                    <td>
                        <?= $prod['name']?>
                    </td>
                    <td>
                        <?= $facprod['quantite']?>
                    </td>
                    <td>
                        <?= $prod['units']?>
                    </td>
                    <td>
                        <?= $prod['prix']?>€
                    </td>
                    <td>
                        <?= $prod['tva']?>€
                    </td>
                    <td>
                        <?= $calc?>€
                    </td>
                    <td>
                        <a href="/?data=facture&action=delete_pdt&fid=<?= $facprod['id_facture'] ?>&id=<?= $facprod['id'] ?>" class="btn btn-danger">supprimer</a>
                    </td>
                </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
        <h2 class="fw-bold">TOTAL: <?= $res?>€</h2>
    </div>
</div>