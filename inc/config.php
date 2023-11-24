<?php

/*
    Vamos ler ficheiro .env onde terá a API_KEY de acesso.
*/


require_once 'dotenv.php';

(new DotEnv(__DIR__ . '/../.env'))->load();
