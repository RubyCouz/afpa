<?php
include '../header.php';
?>
<div class="container">
    <h1>Suppression</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Code et démo</div>
            <div class="collapsible-body">
                <p>
                    La mise en place de la suppression avec Codeginiter reste simple, nous nous attarderons que sur le modèle et le contôleur.
                </p>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s4"><a class="active" href="#test1">Modèle</a></li>
                            <li class="tab col s4"><a href="#test2">Contrôleur</a></li>
                            <li class="tab col s4"><a href="#test3">Vue</a></li>
                        </ul>
                    </div>
                    <div id="test1" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars('
     /**
     * Suppression d\'un produit
     */
    public function delete($id)
    {
        // chargement de la base de données
        $this->load->database();
        // clause pour exécuter la requête selon l\'id du produit
        $this->db->where(\'pro_id\', $id);
        // exécution de la requète
        $this->db->delete(\'produits\');
        
    }') ?>
    </code>
                        </pre>
                    </div>
                    <div id="test2" class="col s12">
                        <pre>
    <code class="php">
                                <?= htmlspecialchars(' 
     /**
     * Suppression d\'un produit
     */
    public function delete($id) {
        // appel de l\'helper pour la gestion des urls
        $this->load->helper(\'url\');
      // chargement du model Prod_model
        $this->load->model(\'Prod_model\');
        // appel de la méthode delete
        $this->Prod_model->delete($id);
        // redirection vers la liste de produit
        redirect(\'produits/liste\');
    }') ?>
    </code>
                        </pre>
                    </div>
                    <div id="test3" class="col s12">
                        <pre>
    <code class="HTMLBars">
                                <?= htmlspecialchars('
<div id="modal<?= $produits->pro_id ?>" class="modal">
    <div class="modal-content">
        <h4>Suppression de <?= $produits->pro_libelle ?></h4>
        <p>Etes-vous sûr de bien vouloir supprimer le produit <?= $produits->pro_libelle ?> ?</p>
        <p>Cette suppression sera irréversible et vous pourrez plus retrouver ce produit.</p>
    </div>
    <div class="modal-footer">
        <div class="row">
            <div class="col s3 offset-s6">
                <a href="<?= site_url(\'Produits/delete/\' . $produits->pro_id) ?>" class="modal-close waves-effect waves-green btn red accent-4">Confirmer</a>
            </div>
            <div class="col s3">
                <a href="#!" class="modal-close waves-effect waves-green btn cyan accent-4">Annuler</a>
            </div>
        </div>
    </div>
</div>
') ?>
    </code>
                        </pre>
                    </div>
                </div>
                <a href="../ci/index.php/produits/liste" class="waves-effect waves-light btn" title="Lien vers démo" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
                <p>
                    Pour que la suppression soit effective, l'utilisateur passera d'abord par une fenêtre modale lui demandant une confirmation. Si l'utilisateur confirme, il devra cliquer sur un lien qui le dirigera ver sle contrôleur et la méthode adéquaten en passant en paramêtre l'id du produit à  supprimer : 
                </p>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>