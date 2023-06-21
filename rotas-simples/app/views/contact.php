<?php $this->layout('master') ?>

<h1>Contact</h1>

<form action="/contact" method="post">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="email" placeholder="Email">
    <button type="submit">Enviar</button>
</form>