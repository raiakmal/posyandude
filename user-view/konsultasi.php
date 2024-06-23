<?php 
include '../koneksi.php';

if(isset($_POST['nama_ibu'])) {
    $namaIbu = $_POST['nama_ibu'];
    $namaAnak = $_POST['nama_anak'];
    $email = $_POST['email'];
    $keluhan = $_POST['keluhan'];

    if (!empty($namaIbu) && !empty($namaAnak) && !empty($email) && !empty($keluhan)) {
        // Prepared statement to insert data into keluhan table
        $stmt = $conn->prepare("INSERT INTO keluhan (Nama_Ibu, Nama_Anak, Email, Keluhan) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssss", $namaIbu, $namaAnak, $email, $keluhan);

            if ($stmt->execute()) {
                $response = ["status" => "success", "message" => "Data berhasil dikirim"];
            } else {
                $response = ["status" => "error", "message" => "Error: " . $stmt->error];
            }

            // Close the statement
            $stmt->close();
        } else {
            // Show the MySQL error if the prepare statement fails
            $response = ["status" => "error", "message" => "Error: " . $conn->error];
        }
    } else {
        $response = ["status" => "error", "message" => "Isi semua form."];
    }

    // Set header to JSON
    header('Content-Type: application/json');

    // Return response as JSON
    echo json_encode($response);

    // Stop further execution
    exit;
}
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
    <nav class="bg-blue-500 p-4">
      <div class="container mx-auto flex justify-between items-center">
        <a href="../index.html">
          <div class="flex items-center">
            <div>
              <img src="../images/logo.png" alt="Logo" class="h-10 w-10" />
            </div>
            <div>
              <span class="text-2xl font-bold text-blue-200" style="font-family: 'Montserrat', sans-serif">UNDA</span>
            </div>
          </div>
        </a>
        <div class="hidden md:flex space-x-8">
          <a href="../index.html" class="text-white text-lg font-bold opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Beranda</a>
          <a href="artikel.html" class="text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Artikel</a>
          <a href="konsultasi.html" class="text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Konsultasi</a>
          <a href="jadwal.html" class="text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Jadwal</a>
        </div>
        <div class="hidden md:block">
          <a href="../admin-view/index.php" class="text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Login</a>
        </div>
        <div class="md:hidden">
          <button type="button" class="text-white focus:outline-none">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </nav>

    <div class="md:hidden">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <a href="../index.html" class="block text-white text-lg font-bold opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Beranda</a>
        <a href="artikel.html" class="block text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Artikel</a>
        <a href="konsultasi.html" class="block text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Konsultasi</a>
        <a href="jadwal.html" class="block text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Jadwal</a>
        <a href="../admin-view/index.php" class="block text-white text-lg font-medium opacity-70 hover:opacity-100" style="font-family: 'Poppins', sans-serif">Login</a>
      </div>
    </div>

    <main>
      <!-- Form Keluhan -->
      <div class="container mx-auto p-8">
        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
          <h2 class="text-2xl text-blue-700 font-bold mb-4 text-center">Konsultasi</h2>
          <form id="konsultasiForm" method="POST">
            <div class="mb-4">
              <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
              <input type="text" id="nama_ibu" name="nama_ibu" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required />
            </div>
            <div class="mb-4">
              <label for="nama_anak" class="block text-sm font-medium text-gray-700">Nama Anak</label>
              <input type="text" id="nama_anak" name="nama_anak" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required />
            </div>
            <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <input type="email" id="email" name="email" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required />
            </div>
            <div class="mb-4">
              <label for="keluhan" class="block text-sm font-medium text-gray-700">Keluhan</label>
              <textarea id="keluhan" name="keluhan" rows="4" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
            </div>
            <div class="flex justify-end mb-4">
              <button type="submit" name="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Kirim</button>
            </div>
          </form>
        </div>
      </div>
      <!-- End Form Keluhan -->
    </main>

    <footer class="bg-gray-800 text-white text-center py-4">
      <p>&copy; 2024 Posyandu Bunda</p>
    </footer>


    <script>
      document.getElementById('konsultasiForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('konsultasi.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          alert(data.message);
          // Refresh halaman setelah 1 detik
          setTimeout(function() {
            window.location.reload();
          }, 1000);
        } else {
          alert(data.message);
        }
      })
      .catch(error => console.error('Error:', error));
    });
    </script>
  </body>
</html>