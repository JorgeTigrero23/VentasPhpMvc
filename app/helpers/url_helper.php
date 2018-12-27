<?php

// Para redireccionar pagina
function redirection($page)
{
    header('location: '.URL_PATH. $page);
}