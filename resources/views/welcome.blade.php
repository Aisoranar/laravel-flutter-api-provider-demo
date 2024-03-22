<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Estilos personalizados -->
  <style>
    /* Agregar estilos personalizados aquí */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .hero {
      background-image: url('https://images.unsplash.com/photo-1499951360447-b19be8fe80f5');
      background-size: cover;
      background-position: center;
      height: 400px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      margin-top: 20px;
    }

    .overlay {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 20px;
    }

    .overlay h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      color: #333; /* Cambio de color del texto */
    }

    .overlay p {
      font-size: 1.2rem;
      margin-bottom: 20px;
      color: #666; /* Cambio de color del texto */
    }

    .btn {
      background-color: #007bff;
      color: #fff;
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
      transition: background-color 0.3s;
      text-decoration: none;
    }

    .btn:hover {
      background-color: #0056b3;
    }
  </style>
  <!-- Enlaces de fuentes y bibliotecas -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <title>Bienvenido a nuestra Red Social</title>
</head>
<body>
  <div class="container">
    <div class="hero"></div>
    <div class="overlay">
      <h1 style="color: #333;">Bienvenid@</h1>
      <p style="color: #666;">Comparte tus publicaciones.</p>
      <a href="{{ route('login') }}" class="btn">Iniciar Sesión</a>
    </div>
  </div>
</body>
</html>
