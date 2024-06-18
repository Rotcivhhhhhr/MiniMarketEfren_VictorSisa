document.getElementById('productForm').addEventListener('submit', function(event) {
    let isValid = true;
    
    // Obtener los valores de los campos del formulario
    const name = document.getElementById('name').value.trim();
    const price = document.getElementById('price').value.trim();
    const quantity = document.getElementById('quantity').value.trim();
    
    // Limpiar mensajes de error previos
    document.getElementById('nameError').textContent = "";
    document.getElementById('priceError').textContent = "";
    document.getElementById('quantityError').textContent = "";

    // Validar Nombre del Producto
    const nameRegex = /^[A-Za-z\s]+$/;
    if (!nameRegex.test(name)) {
        document.getElementById('nameError').textContent = "El nombre del producto solo debe contener letras y espacios.";
        isValid = false;
    }
    
    // Validar Precio por Unidad
    const priceRegex = /^[0-9]+(\.[0-9]{1,2})?$/;
    if (!priceRegex.test(price)) {
        document.getElementById('priceError').textContent = "El precio debe ser un número positivo con hasta dos decimales.";
        isValid = false;
    }

    // Validar Cantidad de Inventario
    const quantityRegex = /^[0-9]+$/;
    if (!quantityRegex.test(quantity)) {
        document.getElementById('quantityError').textContent = "La cantidad debe ser un número entero no negativo.";
        isValid = false;
    }
    
    // Si alguna validación falla, prevenir el envío del formulario
    if (!isValid) {
        event.preventDefault();
    }
});


