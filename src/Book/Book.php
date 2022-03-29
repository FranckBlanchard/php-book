<?php

/**
 * créé le 2022-03-12
 */

namespace Book;

use Book\Utils\Console;

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
     * @var array<string>|null $filePath Chemin des répertoires sources et destinations des fichiers a traiter.
     */
    protected $filePath = array("src" => 'app/src', "build" => 'app/build');
    /**
     * Détermine le mode de génération des fichiers html.
     * @var string $htmlMode
     */
    protected $htmlMode='multiple';

    /**
     * Initialisation de notre objet Book.
     * @param array<string> $filePath Chemin des fichiers source Markdown et répertoire de destination
     * des fichiers a créer.
     * @param array<array<string>>|null $chapters Tableaux contenant la liste des chapitres.
     */
    public function __construct($filePath, $chapters = null)
    {
        /**
         * Vérification de la liste des chapitres
         */
        if (is_array($chapters)) {
            Console::writeln("Initialisation de la liste des chapitres.");
            $this->chapters = $chapters;
            Console::writeln("Listes des chapitres initialisé.");
        }
        /**
         * Vérification et initialisation des chemins des répertoires
         */
        /**
         * Initialisation du répertoire des fichiers sources en Markdown
         */
        $this->initPath('src', $filePath);
        Console::writeln(sprintf("Vos fichiers sources devront se trouver dans le répertoire: %s .", $filePath['src']));
        /**
         * Initialisation du répertoire des fichiers cibles pdf,html...
         */
        $this->initPath('build', $filePath);
        Console::writeln("Fin de l'initialisation.");
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
                $msg = sprintf("Initialisation du répertoire : < %s > à < %s >.", $key, $path[$key]);
                Console::writeln($msg, "succes");
            } else {
                $msg = sprintf("ERREUR: le répertoire < %s > n'existe pas!", $path[$key]);
                Console::writeln($msg, "danger");
                Console::writeln("Le répertoire par défaut sera utilisé.");
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
            return true;
        } else {
            return false;
        }
    }

    /**
     * Ajoute un nouveau chapitre à la fin de la liste.
     *
     * @param array<string> $chapter
     */
    public function addChapter($chapter): void
    {
        $this->chapters[] = $chapter;
        Console::writeln(sprintf("Le chapitre « %s » a été ajouté.", $chapter[0]), "succes");
    }

    /**
     * Construit un document html a partir d'un document Markdown.
     *
     */
    public function createHtmlFromMarkdowndFile(): void
    {
        Console::writeln("Création du fichier html.");
    }

    /**
     *
     * @param string $mode <standalone|multiple> Mode de création des cible.
     * standalone : les fichiers sources seront concaténé,et un seul fichier cible sera généré.
     * multiple : pour chaque fichier source, un fichier cible sera généré.
     * @return void
     */
    public function setHtmlMode($mode): void
    {
        $this->htmlMode = $mode;
    }

}
