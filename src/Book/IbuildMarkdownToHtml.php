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
     * @param string $name Nom du fichier source Markdown
     * @return void
     */
    public function setMarkdownFileName($name): void;
}
