<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Book;

/**
 * pandocBuildHtml implémente IbuildHtml
 *
 * @author Franck Blanchard <info@aztequemedia.com>
 */
class PandocBuildHtml implements IbuildMarkdownToHtml
{
    /**
     *
     * @var string $srcFile Nom du fichier source en Markdown
     */
    protected $srcFile;

    public function setMarkdownFileName($name): void
    {
        $this->srcFile = $name;
    }
}
