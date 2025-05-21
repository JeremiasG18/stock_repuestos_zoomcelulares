<section>
    <section>
        <h2>Nuevo Repuesto</h2>
        <form action="src/ajax/ajax_repuesto.php" method="post" class="form">
            <input type="hidden" name="guardar" value="repuesto">
            <label for="marca">Marca</label>
            <select name="marca" id="marca" class="selectMarcas">
                <option value="0">Seleccione una Marca</option>
            </select>
            <label for="modelo">Modelo</label>
            <select name="modelo" id="modelo" class="selectModelos">
                <option value="0">Seleccione un Modelo</option>
            </select>
            <label for="repuesto">Repuesto</label>
            <input type="text" name="repuesto" id="repuesto" placeholder="Ingrese el nombre del repuesto">
            <label for="stock">Stock</label>
            <input type="text" name="stock" id="stock" placeholder="Ingrese el stock del repuesto">
            <input type="submit" value="Guardar Repuesto">
        </form>
    </section>

    <section>
        <h2>Buscar Repuesto</h2>
        <form action="index.php" method="post" class="formSearch">
            <label for="repuesto">Repuesto</label>
            <span class="Ji89fk _50XRwB IbFGmN" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="GuAJkS"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"><path d="M10 3a7 7 0 107 7 7 7 0 00-7-7zM21 21l-6-6" vector-effect="non-scaling-stroke"></path></g></svg></span>
            <input type="text" name="repuesto" placeholder="Ingrese el nombre del repuesto" id="repuesto">
            <input type="submit" value="Buscar">
        </form>
        <div class="contenedor">
            
        </div>
    </section>
</section>