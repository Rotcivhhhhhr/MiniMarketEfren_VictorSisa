<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS DE UN MINIMARKET</title>
    <link href="./css/tailwind.css" rel="stylesheet">
    <script src="main.js" defer></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Productos del Minimarket</h1>
        <form id="productForm" method="POST" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <span id="nameError" class="text-red-500 text-sm"></span>
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Precio por Unidad</label>
                <input type="text" id="price" name="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <span id="priceError" class="text-red-500 text-sm"></span>
            </div>
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad del Inventario</label>
                <input type="text" id="quantity" name="quantity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <span id="quantityError" class="text-red-500 text-sm"></span>
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Agregar Producto</button>
            </div>
        </form>
        <?php
        // Array para almacenar los productos
        $productos = [];

        // Función para agregar un producto al array asociativo
        function agregarProducto($producto) {
            global $productos;
            $producto['valor_total'] = $producto['precio'] * $producto['cantidad'];
            $producto['estado'] = $producto['cantidad'] > 0 ? 'En Stock' : 'Agotado';
            $productos[] = $producto;
        }

        // Función para generar la tabla de productos
        function mostrarTablaProductos($productos) {
            echo '<table class="min-w-full divide-y divide-gray-200">';
            echo '<thead class="bg-gray-50">';
            echo '<tr>';
            echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre del Producto</th>';
            echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio por Unidad</th>';
            echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad de Inventario</th>';
            echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor Total</th>';
            echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody class="bg-white divide-y divide-gray-200">';
            foreach ($productos as $producto) {
                echo '<tr>';
                echo '<td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($producto['nombre']) . '</td>';
                echo '<td class="px-6 py-4 whitespace-nowrap">' . number_format($producto['precio'], 2) . '</td>';
                echo '<td class="px-6 py-4 whitespace-nowrap">' . $producto['cantidad'] . '</td>';
                echo '<td class="px-6 py-4 whitespace-nowrap">' . number_format($producto['valor_total'], 2) . '</td>';
                echo '<td class="px-6 py-4 whitespace-nowrap">' . $producto['estado'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }

        // Procesar el formulario al enviar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['name'];
            $precio = floatval($_POST['price']);
            $cantidad = intval($_POST['quantity']);

            $producto = [
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => $cantidad
            ];

            agregarProducto($producto);
        }

        if (!empty($productos)) {
            mostrarTablaProductos($productos);
        }
        ?>
    </div>
</body>
</html>


