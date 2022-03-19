<?php

/**
 * créé le 2022-03-12
 */

namespace Book;

/**
 * Book est une class PHP pour gérer la gestion d'une documentation, en s'inspirant du fonctionnement d'un livre.
 *
 * @author Franck Blanchard <info@aztequemedia.com>
 *
 */
class Book
{

    /**
     * @var array<array<string>>|null $chapters Tableau contenant la liste des chapitres.
     */
    protected $chapters = array();

    /**
     * Tableau contenant les chemins par défaut, des répertoires sources, et destinations du livre a créé.
     * @var array<string>|null $filePath Tableau contenant les répertoires sources et destinations des fichiers a traiter.
     */
    protected $filePath = array("src" => 'app/src', "build" => 'app/build');

    /**
     * Initialisation de notre objet Book.
     * @param array<string> $filePath Répertoire des fichiers source Markdown et répertoire de destination des fichiers créés.
     * @param array<array<string>>|null $chapters Tableaux contenant la liste des chapitres.
     */
    public function __construct($filePath, $chapters = null)
    {
        /**
         * Vérification de la liste des chapitres
         */
        if (is_array($chapters)) {
            $this->msgConsole('Initialisation de la liste des chapitres.');
            $this->chapters = $chapters;
            $this->msgConsole('Listes des chapitres initialisé.');
        }
        /**
         * Vérification et initialisation des chemins des répertoires
         */
        $this->initPath('src', $filePath);
        $this->initPath('build', $filePath);
        $this->msgConsole("Fin de l'initialisation.");
    }

    /**
     * @param string $key Clé du répertoire a initialiser
     * @param array<string> $path Contient le nom des répertoires a tester.
     */
    protected function initPath($key, $path): void
    {
        if (is_array($path)) {
            if (array_key_exists($key, $path) && $this->isValidPath($path[$key])) {
                $this->filePath[$key] = $path[$key];
                $this->msgConsole("Initialisation du répertoire : < $key > à < $path[$key] >.");
            } else {
                $this->msgConsole("ERREUR: le répertoire < $path[$key] > n'existe pas!");
            }
        }
    }

    /**
     *
     * @param string $path Vérifie si le répertoire est valide.
     * @return bool
     */
    protected function isValidPath($path = null): bool
    {
        if (isset($path) && is_dir($path)) {
//            $this->msgConsole("Le répertoire < $path > est valide.");
            return true;
        } else {
//            $this->msgConsole("Le répertoire " . $path . " est invalide.");
            return false;
        }
    }

    /**
     * Fonction d'affichage de message d'information.
     * @param string $msg Message a afficher.
     * @return void
     */
    protected function msgConsole($msg): void
    {
        printf("\n%s\n", $msg);
    }

    /**
     * Fonction qui ajoute un nouveau chapitre à la fin de la liste.
     *
     * @param array<string> $chapter
     */
    public function addChapter($chapter): void
    {
        $this->chapters[] = $chapter;
    }

    /**
     *
     * @param string $mdFile Nom du fichier Markdown a transformer
     */
    public function createHtmlFileMd($mdFile): void
    {

    }

}
