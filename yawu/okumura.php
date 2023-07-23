
<?php 
// require_once("server.php");
// $id = $_GET["id"]; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PATHLOSS MODEL</title>

    <?php
        include('./include/header.html');
    ?>
</head>
<body>

    <?php
        include('./include/sidebar.html');
    ?>

    <div class="main">
        
        <?php
            include('./include/navbar.html');
            include('./include/loading.html');
        ?>
        
        <div id="quickAccesses">
            <div class="widthMaintainer /access-cards">

                <div class="container">
                    <h2 class="text-green fw-bold student-name">Okumura-Hata Model</h2>
                    <hr>
                    <br>
                    <label for="frequency">Frequency (MHz):</label>
                    <input type="number" id="frequency" required>

                    <label for="distance">Distance (km):</label>
                    <input type="number" id="distance" required>

                    <label for="height_tx">Transmitter Antenna Height (m):</label>
                    <input type="number" id="height_tx" required>

                    <label for="height_rx">Receiver Antenna Height (m):</label>
                    <input type="number" id="height_rx" required>

                    <label for="environment">Environment Type:</label>
                    <select id="environment" required>
                        <option value="urban">Urban</option>
                        <option value="suburban">Suburban</option>
                        <option value="rural">Rural</option>
                    </select>

                    <button onclick="calculatePathLoss()">Calculate Path Loss</button>

                    <div id="result"></div>
                </div>
 
            </div>
            <?php
                include('./include/footer.html');
            ?>
        </div>
    </div>

    
    <!-- <script src="assets/js/dashnav.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <script>
        function calculatePathLoss() {
            var frequency = parseFloat(document.getElementById('frequency').value);
            var distance = parseFloat(document.getElementById('distance').value);
            var height_tx = parseFloat(document.getElementById('height_tx').value);
            var height_rx = parseFloat(document.getElementById('height_rx').value);
            var environment = document.getElementById('environment').value;

            if (isNaN(frequency) || isNaN(distance) || isNaN(height_tx) || isNaN(height_rx)) {
                alert('Please enter valid numerical values.');
                return;
            }

            // Perform the path loss calculation (same Okumura-Hata formula as before)
            var path_loss;
            if (distance <= 3) {
                path_loss = 69.55 + 26.16 * Math.log10(frequency) - 13.82 * Math.log10(height_tx) -
                            (1.1 * Math.log10(frequency) - 0.7) * height_rx + (1.56 * Math.log10(frequency) - 0.8);
            } else {
                path_loss = 69.55 + 26.16 * Math.log10(frequency) - 13.82 * Math.log10(height_tx) -
                            (1.1 * Math.log10(frequency) - 0.7) * height_rx + (1.56 * Math.log10(frequency) - 0.8) +
                            37.6 * Math.log10(distance);
            }

            // Display the result on the page
            var resultElement = document.getElementById('result');
            resultElement.textContent = 'Path Loss: ' + path_loss.toFixed(2) + ' dB';

            // Generate Excel data
            var data = [
                ['Frequency (MHz)', 'Distance (km)', 'Transmitter Antenna Height (m)', 'Receiver Antenna Height (m)', 'Environment Type', 'Path Loss (dB)'],
                [frequency, distance, height_tx, height_rx, environment, path_loss.toFixed(2)]
            ];

            // Convert data to Excel format
            var worksheet = XLSX.utils.aoa_to_sheet(data);
            var workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, 'PathLossData');

            // Convert workbook to binary Excel format
            var excelBinaryData = XLSX.write(workbook, { bookType: 'xlsx', type: 'binary' });

            // Create a Blob with the Excel binary data
            var blob = new Blob([s2ab(excelBinaryData)], { type: 'application/octet-stream' });

            // Generate a temporary URL for the Blob
            var url = URL.createObjectURL(blob);

            // Create a download link and click it to trigger the download
            var a = document.createElement('a');
            a.href = url;
            a.download = 'path_loss_data.xlsx';
            a.click();

            // Clean up the temporary URL
            setTimeout(function() {
                URL.revokeObjectURL(url);
            }, 100);
        }

        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
        }

        // For Navigation toggle
        const navToggle = () => {
            let menuIcon = document.querySelector(".nav-icon");
            let sidebar = document.querySelector(".sidebar");

            menuIcon.addEventListener("click", () => {
                sidebar.classList.toggle("showSidebar");
            })

        }

        navToggle();

        // Simulate a loading delay
        setTimeout(function() {
        // Hide the loading container after some time (simulating data fetching, etc.)
        document.getElementById('loadingContainer').style.display = 'none';
        }, 3000); // Change the delay value as needed (in milliseconds)
        
    </script>
    <!-- <script src="assets/js/nav.js"></script> -->
   
</body>
</html>