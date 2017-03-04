<?php
/**
 * Created by IntelliJ IDEA.
 * User: juanxxiii
 * Date: 13/02/2017
 * Time: 19:11
 */

echo'<form method="post" action="registro.php" class="form-horizontal">';
echo'<div class="form-group">';
echo '<label for="usuario" class="col-sm-2 control-label">Nombre de usuario</label>';
echo '<div class="col-sm-5">';
echo '<input type="text" name="usuario" placeholder="Nombre de Usuario" id="usuario" class="form-control"/>';
echo '</div></div>';
echo'<div class="form-group">';
echo '<label for="password" class="col-sm-2 control-label">Contraseña</label>';
echo '<div class="col-sm-5">';
echo '<input type="password" name="password" placeholder="Password" id="password" class="form-control"/>';
echo '</div></div>';
echo'<div class="form-group">';
echo '<label for="dni" class="col-sm-2 control-label">DNI</label>';
echo '<div class="col-sm-5">';
echo '<input type="text" name="dni" placeholder="DNI" id="dni" class="form-control"/>';
echo '</div></div>';
echo'<div class="form-group">';
echo '<label for="nombre" class="col-sm-2 control-label">Nombre</label>';
echo '<div class="col-sm-5">';
echo '<input type="text" name="nombre" placeholder="Nombre" id="nombre" class="form-control"/>';
echo '</div></div>';
echo'<div class="form-group">';
echo '<label for="apellidos" class="col-sm-2 control-label">Apellidos</label>';
echo '<div class="col-sm-5">';
echo '<input type="text" name="apellidos" placeholder="Apellidos" id="apellidos" class="form-control"/>';
echo '</div></div>';
echo'<div class="form-group">';
echo '<label for="telefono" class="col-sm-2 control-label">Telefono</label>';
echo '<div class="col-sm-5">';
echo '<input type="text" name="telefono" placeholder="Num.Teléfono" id="telefono" class="form-control"/>';
echo '</div></div>';
echo'<div class="form-group">';
echo '<label for="cp" class="col-sm-2 control-label">Código Postal</label>';
echo '<div class="col-sm-5">';
echo '<input type="text" name="cp" placeholder="Código Postal" id="cp" class="form-control"/>';
echo '</div></div>';
echo'<div class="form-group">';
echo '<div class="col-sm-offset-2 col-sm-10">';
echo '<input type="submit" value="Enviar" class="btn btn-primary"> ';
echo ' <input type="reset" value="Resetear" class="btn btn-default">';
echo '</div></div>';
echo '</form>';
