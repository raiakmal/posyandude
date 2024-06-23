<?php  
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@500;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <title>Posyandude</title>
  </head>
  <body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-blue-500 p-4">
      <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center">
          <div>
            <img src="../images/logo.png" alt="Logo" class="h-10 w-10" />
          </div>
          <div>
            <span class="text-2xl font-bold text-blue-200" style="font-family: 'Montserrat', sans-serif">UNDA</span>
          </div>
        </div>
        <div class="hidden md:flex space-x-8">
          <a href="index.html" class="text-white text-lg font-bold opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Beranda</a>
          <a href="artikel.html" class="text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Artikel</a>
          <a href="konsultasi.html" class="text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Konsultasi</a>
          <a href="jadwal.html" class="text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Jadwal</a>
        </div>
        <div class="hidden md:block">
          <a href="../admin-view/index.php" class="text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Login</a>
        </div>
        <div class="md:hidden">
          <button type="button" class="text-white focus:outline-none">
            <!-- Mobile menu button icon -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="md:hidden">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <a href="index.html" class="block text-white text-lg font-bold opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Beranda</a>
        <a href="artikel.html" class="block text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Artikel</a>
        <a href="konsultasi.html" class="block text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Konsultasi</a>
        <a href="jadwal.html" class="block text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Jadwal</a>
        <a href="../admin-view/index.php" class="block text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Login</a>
      </div>
    </div>

    <main>
      <!-- Buat Ngoding -->
    </main>

    <footer class="bg-gray-800 text-white text-center py-4">
      <p>&copy; 2024 Posyandu Bunda</p>
    </footer>

    <script>
      document.querySelector('button').addEventListener('click', () => {
        document.querySelector('.md\\:hidden').classList.toggle('hidden');
      });
    </script>
  </body>
</html>
