<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Book;

use Book\Utils\Console;

/**
 * pandocBuildHtml implémente IbuildHtml
 *
 * @author Franck Blanchard <info@aztequemedia.com>
 */
class PandocBuildHtml implements IbuildMarkdownToHtml
{
    /**
     *
     * @var string $program Nom du programme qui va effectué la traduction.
     */
    protected $program = 'pandoc';

    /**
     *
     * @var string $markdownFile Nom du fichier source en Markdown
     */
    protected $markdownFile;

    /**
     *
     * @var String $htmlFile Non du fichier html a construire
     */
    protected $htmlFile;

    /**
     *
     * @var string $cmd Commande a passer au système pour produire le fichier html
     */
    protected $cmd;

    /**
     *
     * @param string|null $markdownFile
     * @param string|null $htmlFile
     */
    public function __construct($markdownFile = null, $htmlFile = null)
    {
        if (!$htmlFile == null) {
            $this->htmlFile = $htmlFile;
        }
        if (!$markdownFile == null) {
            $this->markdownFile = $markdownFile;
        }
    }

    public function setMarkdownFileName($name): void
    {
        $this->markdownFile = $name;
    }

    public function setHtmlFileName($name): void
    {
        $this->htmlFile = $name;
    }

    protected function setPandocCmdLine(): void
    {
        $this->cmd = sprintf(" %s -f markdown -t html -o %s %s", $this->program, $this->htmlFile, $this->markdownFile);
    }

    public function build(): void
    {
        $this->setPandocCmdLine();
        Console::writeln(sprintf("Création du fichier %s", $this->htmlFile));
        $result = system($this->cmd);
        echo $result;
        if ($result === false) {
            Console::writeln("Il semblerait qu'il y ai eu un problème à la création du fichier.");
        } else {
            Console::writeln(sprintf("Le fichier %s a bien été créé.", $this->htmlFile), 'succes');
        }
    }

}
