<?php
/**
 * fonction qui permet de gérer soit le print_r() soit le var_dump()
 * @param [type] $el
 * @param integer $mode soit 1 pour print_r / != 1 pour var_dump (different de 1)
 * @return [type]             [descripton]
 */
function debug($el,$mode = 1)
{
          echo '<pre>';
                    ($mode == 1) ? print_r($el) : var_dump($el);
          echo '</pre>';
}
function verifChamp(string $data, string $caractAutor,int $lgMin, int $lgMax, string $name)
{
          // je recupere la variable $content dans l'espace local. attention avec l'utilisation de global...
          global $content;
                    if(!preg_match('#^' . $caractAutor . '{' . $lgMin . ',' . $lgMax . '}+$#', $data))
                    {
                              $content .= "<div class='alert alert-danger'>Le format <b>{$name}</b> n'est pas correct.
                              Caractères autorisés : {$caractAutor}. <br>Longueur maximale autorisée : {$lgMax}.
                              <br>Longueur minimale : {$lgMin}</div>";
                    }
}
/**
* Verif Int description
* @param string $dataUser saisie de l'utilisateur
* @param int $lgNbre          longueur de la saisie
* @param string $name         intitulé du champ
* @return string    $content
*/
function verifInt(string $dataUser, int $lgNbre, string $name)
{         // verifInt($telPortable,10,'Téléphone fixe');
          // echo gettype($dataUser);
          // je recupere la variable $content dans l'espace local. attention avec l'utilisation de global...
          global $content;
                    if(!preg_match('#^[0-9]{' . $lgNbre . '}+$#', $dataUser))
                    {
                              $content .= "<div class='alert alert-danger'>
                              Le format de {$dataUser} est incorrect, il doit
                              contenir {$lgNbre} chiffre.</div>";
                    }
}