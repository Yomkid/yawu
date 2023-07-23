
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
                    <h2 class="text-green fw-bold student-name">Log-Distance Path Loss Calculation</h2>
                    <hr>
                    <br>
                    <label for="frequency">Frequency (Hz):</label>
                    <input type="number" id="frequency" required>

                    <label for="distance">Distance (meters):</label>
                    <input type="number" id="distance" required>

                    <label for="d0">Reference Distance (meters):</label>
                    <input type="number" id="d0" required>

                    <label for="path_loss_exponent">Path Loss Exponent (n):</label>
                    <input type="number" id="path_loss_exponent" required>

                    <label for="shadowing_std_dev">Shadowing Standard Deviation (sigma):</label>
                    <input type="number" id="shadowing_std_dev" required>

                    <button onclick="calculatePathLoss()">Calculate Path Loss</button>

                    <div id="result"></div>
                
                    <button id="downloadBtn" style="display: none;" onclick="downloadExcel()">Download Excel</button>
                </div>
            </div>
            <?php
                include('./include/footer.html');
            ?>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <script>
        var pathLossData;

        function calculatePathLoss() {
            var frequency = parseFloat(document.getElementById('frequency').value);
            var distance = parseFloat(document.getElementById('distance').value);
            var d0 = parseFloat(document.getElementById('d0').value);
            var pathLossExponent = parseFloat(document.getElementById('path_loss_exponent').value);
            var shadowingStdDev = parseFloat(document.getElementById('shadowing_std_dev').value);

            if (isNaN(frequency) || isNaN(distance) || isNaN(d0) || isNaN(pathLossExponent) || isNaN(shadowingStdDev)) {
                alert('Please enter valid numerical values.');
                return;
            }

            // Calculate Log-Distance Path Loss
            var X_sigma = shadowingStdDev * (Math.random() * 2 - 1); // Random shadowing effect
            var pathLoss = 10 * pathLossExponent * Math.log10(distance / d0) + X_sigma;

            // Display the result on the page
            var resultElement = document.getElementById('result');
            resultElement.textContent = 'Log-Distance Path Loss: ' + pathLoss.toFixed(2) + ' dB';

            // Show the download button
            var downloadBtn = document.getElementById('downloadBtn');
            downloadBtn.style.display = 'block';
            
            // Generate path loss data for the Excel file
            pathLossData = [['Distance (meters)', 'Path Loss (dB)']];
            for (var d = 0; d <= distance; d += 1) {
                X_sigma = shadowingStdDev * (Math.random() * 2 - 1); // Random shadowing effect
                pathLoss = 10 * pathLossExponent * Math.log10(d / d0) + X_sigma;
                pathLossData.push([d.toFixed(2), pathLoss.toFixed(2)]);
            }
        }

        function downloadExcel() {
            // Generate Excel data
            var data = pathLossData;

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