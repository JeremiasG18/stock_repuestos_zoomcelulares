<main>
    <section>
        <h2>Crear Marca</h2>
        <form action="src/ajax/ajax_marca.php" method="post" class="form">
            <input type="hidden" name="guardar" value="marca">
            <label for="marca">Marca</label>
            <input type="text" name="marca" placeholder="Ingrese el nombre de la marca" id="marca">
            <input type="submit" value="Guardar Marca">
        </form>
    </section>

    <section>
        <h2>Marcas</h2>
        <div class="contenedorMarcas">

        </div>
    </section>
</main>