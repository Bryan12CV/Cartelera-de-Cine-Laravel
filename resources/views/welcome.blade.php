@extends('layout.plantilla')

@section('tituloPagina', 'CRUD con Laravel')

@section('contenido')
<title>Selecciona una Película</title>
<style>
  /* Estilos básicos */
  body {
    font-family: Arial, sans-serif;
    background-color:#C5D9ED  ;
    
  }
  .movie-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
  }
  .movie-card {
    background-color:#eee;
    border-radius: 8px;
    box-shadow: 0 4px 8px #050505 ;
    overflow: hidden;
    transition: transform 0.3s ease;
    cursor: pointer;
    width: 150px; /* Ajustamos el ancho de todos los botones */
  }
  .movie-card:hover {
    transform: scale(1.05);
  }
  .movie-image {
    width: 100%; /* Para asegurar que la imagen se ajuste al contenedor */
    height: auto;
    border-bottom: 2px solid #eee;
  }
  .movie-title {
    padding: 10px;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    background-color:#eee
  }
  
  /* Estilos para el modal */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5);
  }
  .modal-content {
    background-color: #eee;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
  }
  .close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
  }
  /* Prevent button click from closing modal */
.modal-content button {
  background-color:#F2EB0D ; /* Optional green button style */
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.modal-content button:hover {
  background-color: #D3CD0E ;
}
h1#titulo-cinepolis {
            text-align: center;
            color: white;
            font-size: 36px;
            margin-top: 20px;
}
</style><h1  id="titulo-cinepolis" style="text-align: center;">Cinepolis</h1>
<div class="card-body">
  <div class="row">
      <div class="col-sm-12">
          @if ($mensaje = Session::get('success'))
              <div class="alert alert-success" role="alert">
                  {{ $mensaje }}
              </div>
          @endif
      </div>
  </div>
<div class="movie-container">
  <div class="movie-card" onclick="openModal('Harry Potter 8', 'imagen1.jpg')">
    <img class="movie-image" src="imagen1.jpg" alt="Harry Potter 8" id="imageUrl">
    <div class="movie-title">Harry Potter 8</div>
  </div>
  <div class="movie-card" onclick="openModal('Harry Potter 2', 'pelicula2.jpg')">
    <img class="movie-image" src="img2.jpg" alt="Harry Potter 2" id="imageUrl">
    <div class="movie-title">Harry Potter 2</div>
  </div>
  <div class="movie-card" onclick="openModal('El Señor De Los Anillos', 'imagen3.jpg')">
    <img class="movie-image" src="imagen2.jpg" alt="El Señor De Los Anillos" id="imageUrl">
    <div class="movie-title">El Señor De Los Anillos</div>
  </div>
  <div class="movie-card" onclick="openModal('Star Wars', 'imagen3.jpeg')">
    <img class="movie-image" src="imagen3.jpeg" alt="Star Wars" id="imageUrl">
    <div class="movie-title">Star Wars</div>
  </div>
 
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h3 id="movieTitle"></h3>
    
    <form action="{{route('pelicula.store')}}" method="POST">
      @csrf
      <input type="hidden" id="movieName" name="movieName">
      <label for="cantidad1">Precio del boleto es de 70</label> <br>
      <input type="hidden" id="moviePrecio" name="moviePrecio">
      <label for="cantidad1">Cantidad de boletos:</label>
      <input type="number" id="cantidad" name="cantidad" min="1" value="1" onchange="calcularPrecio()" required><br>
      <p id="precio"></p>
      <label for="pago1">Billete con el que pagas:</label>
      <input type="number" id="pago" name="pago" min="1" value="100" onchange="calcularCambio()" required><br>
      <br>
      <p id="cambio"></p>
      <input type="hidden" id="activo" name="activo">
      <button>Pagar</button>
    </form>
  </div>
</div>

<script>
  function openModal(movieTitle) {
    document.getElementById("movieTitle").innerText = movieTitle;
    document.getElementById("movieName").value = movieTitle;
    document.getElementById("moviePrecio").value = 70;
    document.getElementById("activo").value = 1;
    
   
    document.getElementById("myModal").style.display = "block";
  }

  function closeModal() {
    document.getElementById("myModal").style.display = "none";
  }

  function calcularCambio() {
    const cantidadBoletos = parseInt(document.getElementById("cantidad").value);
    const billetePago = parseInt(document.getElementById("pago").value);
    const costoBoleto = 70;
    const totalAPagar = cantidadBoletos * costoBoleto;
    const cambio = billetePago - totalAPagar;
    
    if (cambio >= 0) {
      document.getElementById("cambio").innerText = "Su cambio es: $" + cambio;
    } else {
      document.getElementById("cambio").innerText = "El pago es insuficiente";
    }
    
  }
  
  function calcularPrecio() {
    const cantidadBoletos = parseInt(document.getElementById("cantidad").value);
    const billetePago = parseInt(document.getElementById("pago").value);
    const costoBoleto = 70;
    const totalAPagar = cantidadBoletos * costoBoleto;

    document.getElementById("precio").innerText =  "Total a pagar $" +  totalAPagar;
  }

</script>
  @endsection