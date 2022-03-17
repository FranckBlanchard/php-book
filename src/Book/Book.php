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
     *
     * @var array<array<string>>|null $chapters Tableau contenant la liste des chapitres.
     */
    protected $chapters = array();
    /**
     *
     * @var array<string>|null $filePath Tableau contenant les répertoires sources et destinations des fichiers a traiter.
     */
    protected $filePath = array("src" => '/src', "build" => '/build');

    /**
     * @param array<string>|null $filePath Répertoire des fichiers source Markdown et répertoire de destination des fichiers créés.
     * @param array<array<string>>|null $chapters Tableaux contenant la liste des chapitres.
     */
    public function __construct($filePath = null, $chapters = null)
    {
        if (is_array($chapters)) {
            $this->chapters = $chapters;
        }
        var_dump($this->filePath,$filePath);

        if (is_array($filePath)) {
            $this->filePath = $filePath;
        }
        echo"initialisation finie ";
        var_dump($this->filePath);
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
