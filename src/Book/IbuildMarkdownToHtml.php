<?php

/**
 * IbuildHtml Interface pour la construction d'un document Html, a partir d'un document Markdown
 * */

namespace Book;

/**
 * IbuildMarkdownToHtml Interface pour la création de document Html a partir de document Markdown
 *
 * @author Franck Blanchard <info@aztequemedia.com>
 */
interface IbuildMarkdownToHtml
{
    /**
     *
     * @param string|null $markdownFile Fichier source Markdown
     * @param string|null $htmlFile Fichier cible Html
     */
    public function __construct(string $markdownFile = null, string $htmlFile = null);
    /**
     *
     * @param string $name Nom du fichier source Markdown
     * @return void
     */
    public function setMarkdownFileName($name): void;
    /**
     *
     * @param string $name nom du fichier cible Html
     * @return void
     */
    public function setHtmlFileName($name): void;
    /**
     * Fonction qui génére la fabrication du document html
     */
    public function build(): void;
}
