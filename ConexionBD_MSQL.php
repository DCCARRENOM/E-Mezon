<?php

    //Datos de la base de datos
    $usuario = "root";
	$password = "";
	$servidor = "localhost";
	$basededatos = "e-mezon";

    // creación de la conexión a la base de datos con mysql_connect()
    //Servidor, usuario, contraseña
    $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");

    
    // Selección del a base de datos a utilizar
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

    // establecer y realizar consulta. guardamos en variable.
	$consulta = "SELECT * FROM productos";
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    
    // Motrar el resultado de los registro de la base de datos
	// Encabezado de la tabla
	echo "<table borde='2'>";
	echo "<tr>";
	echo "<th>IDProducto</th>";
    echo "<th>NombreProducto</th>";
    echo "<th>Stock</th>";
    echo "<th>Valor</th>";
    echo "</tr>";
    
    // Bucle while que recorre cada registro y muestra cada campo en la tabla.
	while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo "<tr>";
		echo "<td>" . $columna['IDProducto'] . "</td><td>" . $columna['NombreProducto'] . "</td><td>" . $columna['Stock'] . "</td><td>" . $columna['Valor'] . "</td>";
		echo "</tr>";
    }
    
    echo "</table>"; // Fin de la tabla


    // cerrar conexión de base de datos
	mysqli_close( $conexion );








?>



