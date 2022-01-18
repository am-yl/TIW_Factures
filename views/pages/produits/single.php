<div class="container">
    <div class="row">
        <form method="POST" action="/?data=produit&action=edit">
            <h1>Gestion du <span class="fw-bold"><?=$produit['name'] ?></span></h1>
            <div class="form-groupe pb-2">
                <label class="form-label" for="nom-produit">Modifier le nom du produit :</label>
                <input type="text" class="form-control"  required name="produit_name" id="produit_name" value="<?=$produit['name'] ?>">
            </div>
            <input type="hidden" name="pid" value="<?= $produit['id'] ?>">
            
            <div class="form-group py-2">
                <label class="form-label" for="prix-produit">Prix du produit </label>
                <input class="form-control" type="text" id="prix-produit" name="prix-produit" placeholder="Prix hors taxe" value="<?=$produit['prix'] ?>" required>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="unite-produit">T.V.A.</label>
                <select class="form-control" type="text" id="tva-produit" name="tva-produit" aria-label="" required>
                    <option selected></option>
                    <option value="5.5">5,5%</option>
                    <option value="20">20%</option>
                </select>   
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="unite-produit">Unité</label>
                <select class="form-control" type="text" id="unite-produit" name="unite-produit" aria-label="" required>
                    <option selected></option>
                    <option value="unite">unitaire</option>
                    <option value="h">à l'heure</option>
                    <option value="m²">volume (mètres carrés)</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="/?data=produit&action=list" class="btn btn-dark">Retourner à la liste des produits</a>
            
        </form>
    </div>
</div>