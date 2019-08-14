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
                            <li class="tab col s3 offset-s3"><a class="active" href="#test1">Modèle</a></li>
                            <li class="tab col s3"><a href="#test2">Contrôleur</a></li>
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
    public function delete() {
        // appel de l\'helper pour la gestion des urls
        $this->load->helper(\'url\');
      // chargement du model Prod_model
        $this->load->model(\'Prod_model\');
        // appel de la méthode delete
        $this->Prod_model->delete();
        // redirection vers la liste de produit
        redirect(\'produits/liste\');
    }') ?>
    </code>
                        </pre>
                    </div>
                </div>

                <a href="../ci/index.php/produits/liste" class="waves-effect waves-light btn" title="Lien vers démo" target="_blank">RUN CODE</a>

            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>