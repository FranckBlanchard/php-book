<?php

declare(strict_types=1);

namespace Book;

use Nette\Neon\Neon;
use Book\Utils\Console;
use Nette\DI\Container;

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
     *
     * @var \Nette\DI\Container $container
     */
    protected $container;

    /**
     *
     * @var array<string>
     */
    protected $parameters = array();

    /**
     * @var array<string>|null $chapters Tableau contenant la liste des chapitres.
     */
    protected $chapters = array();

    /**
     * Tableau contenant les chemins par défaut, des répertoires.
     *
     * @var array<string>|null $filePath Chemin des répertoires.
     */
    protected $filePath = array();

    /**
     * Tableau regroupant les différentes options.
     *
     * @var array <string>|null $options
     */
    protected $options = array();

    /**
     * Initialisation de notre objet Book.
     *
     * @param \Nette\DI\Container $container Container pour l'injection des dépendances
     */
    public function __construct($container)
    {
        $this->container = $container;
        Console::writeln("\nBienvenue dans votre gestionnaire de livre Book.\n", 'succes');
        $this->initParameters($container->getParameters());
    }

    /**
     * initParameters Initialiles les paramètres hérités du container.
     *
     * @param array<array <string>> $parameters Tableau de paramètre;
     * @return void
     */
    protected function initParameters($parameters): void
    {
        Console::write('Initialisation des répertoires de l\'application.');
        /**
         * Initialisation des différents noms de répertoires
         */
        foreach ($parameters['directories'] as $key => $value) {
            $this->filePath[$key] = $value;
        }
        Console::writeOk();
        Console::write('Initialisation des options de génération des documents.');
        /**
         * Initialisation des différentes options
         */
        foreach ($parameters['options'] as $key => $value) {
            $this->options[$key] = $value;
        }
        Console::writeOk();
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
        $this->filePath = $path['parameters']['directories'];
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
//        $this->htmlMode = $mode;
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
