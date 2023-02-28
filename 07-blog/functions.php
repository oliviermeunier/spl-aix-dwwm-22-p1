<?php 

function validateCommentForm(string $nickname, string $content)
{
    $errors = [];

    if (!$nickname) {
        $errors['nickname'] = 'Le champ "pseudo" est obligatoire';
    }

    if (strlen($content) < 10) {
        $errors['content'] = 'Le commentaire doit comporter au moins 10 caractères';
    }

    return $errors;
}