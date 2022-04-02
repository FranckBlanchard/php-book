<?php

declare(strict_types=1);

namespace Book;

use Nette\Neon\Neon;
use Book\Utils\Console;

/**
 * Créé le 2022-03-12
 * @author Franck Blanchard <info@aztequemedia.com>
 *
 * Book
 * Book est une class PHP pour gérer la gestion d'une documentation, en s'inspirant du fonctionnement d'un livre. *
 *
 */
class Book
{
    /**
     * @var array<string>|null $chapters Tableau contenant la liste des chapitres.
     */
    protected $chapters = array();

    /**
     * Tableau contenant les chemins par défaut, des répertoires sources, et destinations du livre a créé.
     * @var array<mixed>|null $filePath Chemin des répertoires sources et destinations des fichiers a traiter.
     */
    protected $filePath = array();

    /**
     * Détermine le mode de génération des fichiers html.
     * @var string $htmlMode
     */
    protected $htmlMode = 'multiple';

    /**
     * Initialisation de notre objet Book.
     */
    public function __construct()
    {
        /**
         * Vérification et initialisation des chemins des répertoires
         */
        Console::writeln("\nBienvenue dans votre gestionnaire de livre Book.\n", 'succes');
        $config = $this->getConfig('books.neon');
        /**
         * ToDo Vérifier que $config est valide
         */
        $this->initPath($config);
    }

    /**
     *
     * @param string $file
     * @return array <string>
     */
    protected function getConfig($file): array
    {
        Console::write("Chargement du fichier de configuration.");
        try {
            $config = Neon::decodeFile($file);
        } catch (\Exception $e) {
            Console::writeln("\nUne erreur est survenue.\n", 'danger');
            Console::writeln(sprintf("%s \n", $e->getMessage()));
            die();
        }
        Console::writeOk();
        return $config;
    }

    /**
     * initPath()
     * Configuration des répertoires par défaut.
     * @param array <mixed> $path
     */
    protected function initPath(array $path): void
    {
        Console::write('Iniatisation des répertoires de l\'application.');
        $this->filePath = $path['directories'];
        Console::writeOk();
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
     * @param string $chapter
     */
    public function addChapter($chapter): void
    {
        $this->chapters[] = $chapter;
        Console::writeln(sprintf("Le chapitre « %s » a été ajouté.", $chapter), "succes");
        var_dump($this->chapters);
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
     *
     * standalone : les fichiers sources seront concaténé,et un seul fichier cible sera généré.     *
     * multiple : pour chaque fichier source, un fichier cible sera généré.
     * @return void
     */
    public function setHtmlMode($mode): void
    {
        $this->htmlMode = $mode;
    }

    /**
     * Configure les livres a créer.
     *
     * @param string $file Nom du projet. L'extension du fichier sert a indiquer quel fichier créer.
     * @param string $mode <alone>|<multiple>|<all>|Drapeau servant a définir le type de fichier a créer.
     *
     *              alone : fabrique un fichier unique, issue de la concaténation des fichier source.
     *
     *              multiple : fabrique un fichier par fichier source.
     *
     *              all : les deux options précedement cité.
     */
    public function createBook($file, $mode): void
    {
        Console::writeln(__METHOD__);
    }
/**
 * Execute la génération des livres.
 * @return void
 */
    public function run(): void
    {
        Console::writeln(__METHOD__);
    }

}
