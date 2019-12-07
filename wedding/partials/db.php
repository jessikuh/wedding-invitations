<?php
        $servername = getenv('DB_HOST');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');
        $dbname = getenv('DB_DATABASE');

        $conn = new mysqli($servername, $username, $password, $dbname);