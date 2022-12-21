<footer>
    <a <?php
        $pathAux = '';
        $dir = getcwd();
        $paths = explode('\\', $dir);



        if(in_array(end($paths), ['create', 'delete', 'read', 'update']))
            $pathAux = '../../';
        echo "href=\"$pathAux".'about.php"';
        ?>>
        <p>&copy; 2022 - Marcelo e Matheus</p>
    </a>
</footer>