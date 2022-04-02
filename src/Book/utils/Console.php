<?php

declare(strict_types=1);

namespace Book\Utils;

/**
 *  Console
 *  Permet l'affichage d'informations dans le terminal.
 *
 * @author Franck Blanchard <info@aztequemedia.com>
 */
class Console
{

    /**
     * Affiche un message dans le terminal.
     *
     * @param string $msg
     * @param string $style Séquence d'échappement Ansi.
     * @return void
     */
    public static function write($msg, $style=""): void
    {
        $colorNormal = "\33[0m";
        $colorSucces = "\33[32m";
        $colorWarning = "\33[33m";
        $colorDanger = "\33[31;1m";

        switch ($style) {
            case 'danger': $color = $colorDanger;
                break;
            case 'warning':$color = $colorWarning;
                break;
            case 'succes':$color = $colorSucces;
                break;
            default: $color = $colorNormal;
                break;
        }
        printf("%s%s%s", $color, $msg, $colorNormal);
    }

    /**
     *  Affiche un message sur une nouvelle ligne dans le terminal.
     * @param string $msg
     * @param string $style Séquence d'échappement Ansi.
     * @return void
     */
    public static function writeln($msg, $style = ""): void
    {
        self::write(sprintf("%s\n", $msg), $style);
    }
    /**
     * writeOk()
     * Ajoute Ok en vert sur la même ligne
     * @return void
     */
    public static function writeOk():void
    {
        self::writeln("\t Ok", 'succes');
    }

    /**
     * Affiche les informations sur php. Voir la documentation pour les valeurs des valeurs utilisées.
     * https://www.php.net/manual/fr/function.phpinfo.php
     * @param int $flags constante définie pour avoir différentes section.
     * @return void
     */
    public static function phpinfo($flags = INFO_ALL): void
    {
        phpinfo($flags);
    }

}
