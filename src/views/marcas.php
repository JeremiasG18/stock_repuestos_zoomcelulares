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
        <h2>Buscar Marca</h2>
        <form action="src/ajax/ajax_marca.php" method="post" class="formSearch">
            <input type="hidden" name="buscar" value="marca">
            <label for="marca">Marca</label>
            <span class="Ji89fk _50XRwB IbFGmN" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="GuAJkS"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"><path d="M10 3a7 7 0 107 7 7 7 0 00-7-7zM21 21l-6-6" vector-effect="non-scaling-stroke"></path></g></svg></span>
            <input type="text" name="marca" placeholder="Ingrese el marca de la marca" id="marca">
            <input type="submit" value="Buscar Marca">
        </form>
        <div class="contenedor">

        </div>
    </section>
</main>