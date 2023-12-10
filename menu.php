<?php include "header.php" ?>



<main class="container">

<section class="my-5">
  <h1 class="text-center">Busque su platillo de preferencia</h1>
</section>


<!-- Filtro de platos -->
<label for="filtro">Filtrar por nombre: </label><br>
<input type="text" Codigo="filtro" oninput="filtrarPlatos()"><br>
<br>

<div class="card col-md-6 col-lg-3" style="width: 18rem;">
      <img src="img/Chilaquiles-Verdes-square.jpg" class="card-img-top" alt="comida">
      <div class="card-body">
        <h5 class="card-title">Chilaquiles <br>
      </div>
    </div>
</section>

<!-- Lista de platos -->
<ul Codigo="listaPlatillos">
    <?php foreach ($platillos as $platillo): ?>
        <li>
            <strong><?= $platillo['Nombre'] ?></strong>
            <p><?= $platillo['Tipo'] ?></p>
            <p><?= $platillo['Duracion'] ?></p>
            <p>Precio: $<?= $platillo['Costo'] ?></p>
            <?php if (isset($_SESSION['usuario'])): ?>
                <button onclick="agregarPedido(<?= $platillo['Codigo'] ?>)">Agregar al Pedido</button>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

<script>
    // Función para filtrar platos
    function filtrarPlatillos() {
        var filtro = document.getElementById('filtro').value;
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var platillosFiltrados = JSON.parse(xhr.responseText);
                mostrarPlatos(platillosFiltrados);
            }
        };

        xhr.open('GET', 'menu.php?filtro=' + filtro, true);
        xhr.send();
    }

    // Función para mostrar platos filtrados
    function mostrarPlatillos(platillos) {
        var listaPlatillos = document.getElementById('listaPlatillos');
        listaPlatillos.innerHTML = '';

        platillos.forEach(function (platillo) {
            var li = document.createElement('li');
            li.innerHTML = '<strong>' + platillo.Nombre + '</strong>' +
                '<p>' + platillo.Tipo + '</p>' +
                '<p>' + platillo.Duracion + '</p>' +
                '<p>Precio: $' + platillo.Costo + '</p>' +
                '<button onclick="agregarPedido(' + platillo.Codigo + ')">Agregar al Pedido</button>';
            listaPlatillos.appendChild(li);
        });
    }

    // Función para agregar plato al pedido
    function agregarPedido(platilloCodigo) {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
            }
        };

        xhr.open('POST', 'menu.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('agregarPedido=1&platoId=' + platilloCodigo);
    }
</script>

</body>
</html>
</main>

<?php include "footer.php" ?>