<?php

/**
 * créé le 2022-03-12
 */

namespace Book;

/**
 * Book est une class PHP pour gérer la gestion d'une documentation, en s'inspirant du fonctionnement d'un livre.
 *
 * @version 0.1.0
 *
 * @author Franck Blanchard <info@aztequemedia.com>
 */
class Book
{

    /**
     *
     * @var array $chapters Tableau contenant la liste des chapitres.
     */
    protected array $chapters;

    /**
     *
     * @param array $chapters Tableaux contenant la liste des chapitres.
     */
    public function __construct(array $chapters)
    {
        if (is_array ($chapters)){
            $this->chapters = $chapters;
        }
    }

    /**
     * Fonction qui ajoute un nouveau chapitre à la liste.
     * @param array $param
     */
    public function addChapter($param)
    {
        var_dump($param);
    }

}
