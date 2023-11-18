<?php

/*
    Vamos ler ficheiro .env onde terá a API_KEY de acesso.
    Retorna 40 caracteres começando na oitava posição
    API_KEY = qwertyuiopasdfghjklçzxcvbnmqwert
    Depois define uma constante API_KEY
*/

$section = file_get_contents('../.env', FALSE, NULL, 8, 40);
define('API_KEY', $section);