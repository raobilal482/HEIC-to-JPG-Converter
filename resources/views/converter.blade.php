{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEIC to JPG Converter</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #f0f4ff, #e2e8ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .converter-container {
            background: #ffffff;
            width: 100%;
            max-width: 450px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .converter-container:hover {
            transform: translateY(-5px);
        }

        h1 {
            font-size: 2rem;
            color: #333;
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .error {
            background: #ffe6e6;
            color: #d32f2f;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 0.9rem;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        input[type="file"] {
            padding: 12px;
            border: 2px dashed #b0bec5;
            border-radius: 8px;
            background: #f9fafb;
            font-size: 1rem;
            color: #666;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        input[type="file"]:hover,
        input[type="file"]:focus {
            border-color: #1976d2;
            outline: none;
        }

        button {
            padding: 12px 25px;
            background: linear-gradient(to right, #1976d2, #42a5f5);
            color: #fff;
            font-size: 1.1rem;
            font-weight: 500;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(25, 118, 210, 0.3);
            transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #1565c0, #2196f3);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(25, 118, 210, 0.4);
        }

        button:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.2);
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.85rem;
            color: #777;
        }

        /* Loading State */
        button.loading {
            background: linear-gradient(to right, #b0bec5, #cfd8dc);
            cursor: not-allowed;
            box-shadow: none;
        }
        button.loading::after {
    content: ' ⏳';
}
    </style>
</head>
<body>
    <div class="converter-container">
        <h1>HEIC to JPG Converter</h1>

        <!-- Error Message -->
        @if (session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form -->
        <form id="converter-form" action="{{ route('converter.convert') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="heic_file">Choose a HEIC File</label>
                <input type="file" name="heic_file" id="heic_file" accept=".heic,.heif" required>
            </div>
            <button type="submit" id="convert-btn">Convert to JPG</button>
        </form>

        <!-- Footer -->
        <p class="footer">Built with ❤️ by Khalid Chandio</p>
    </div>

    <!-- JavaScript to Clear Input -->
    <script>
        document.getElementById('converter-form').addEventListener('submit', function(event) {
            const form = this;
            const button = document.getElementById('convert-btn');
            const input = document.getElementById('heic_file');

            // Optional: Show loading state
            button.textContent = 'Converting...';
            button.classList.add('loading');
            button.disabled = true;

            // Simulate form submission completion (since download happens server-side)
            setTimeout(() => {
                // Clear the file input
                input.value = '';

                // Reset button state
                button.textContent = 'Convert to JPG';
                button.classList.remove('loading');
                button.disabled = false;
            }, 1000); // Adjust delay based on typical conversion time (e.g., 1-2 seconds)
        });
    </script>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEIC to JPG Converter</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #f0f4ff, #e2e8ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .converter-container {
            background: #ffffff;
            width: 100%;
            max-width: 450px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .converter-container:hover {
            transform: translateY(-5px);
        }

        h1 {
            font-size: 2rem;
            color: #333;
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .error {
            background: #ffe6e6;
            color: #d32f2f;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 0.9rem;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        input[type="file"] {
            padding: 12px;
            border: 2px dashed #b0bec5;
            border-radius: 8px;
            background: #f9fafb;
            font-size: 1rem;
            color: #666;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        input[type="file"]:hover,
        input[type="file"]:focus {
            border-color: #1976d2;
            outline: none;
        }

        button {
            padding: 12px 25px;
            background: linear-gradient(to right, #1976d2, #42a5f5);
            color: #fff;
            font-size: 1.1rem;
            font-weight: 500;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(25, 118, 210, 0.3);
            transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #1565c0, #2196f3);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(25, 118, 210, 0.4);
        }

        button:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.2);
        }

        button.loading {
            background: linear-gradient(to right, #b0bec5, #cfd8dc);
            cursor: not-allowed;
            box-shadow: none;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.85rem;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="converter-container">
        <h1>HEIC to JPG Converter</h1>

        <!-- Error Message -->
        @if (session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form -->
        <form id="converter-form" action="{{ route('converter.convert') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="heic_file">Choose a HEIC File</label>
                <input type="file" name="heic_file" id="heic_file" accept=".heic,.heif" required>
            </div>
            <button type="submit" id="convert-btn">Convert to JPG</button>
        </form>

        <!-- Footer -->
        <p class="footer">Built with ❤️ by Khalid Chandio</p>
    </div>

    <!-- JavaScript to Clear Input -->
    <script>
        document.getElementById('converter-form').addEventListener('submit', function(event) {
            const form = this;
            const button = document.getElementById('convert-btn');
            const input = document.getElementById('heic_file');

            // Show loading state
            button.textContent = 'Converting...';
            button.classList.add('loading');
            button.disabled = true;

            // Simulate conversion and download time, then clear input
            setTimeout(() => {
                input.value = ''; // Clear the file input
                button.textContent = 'Convert to JPG';
                button.classList.remove('loading');
                button.disabled = false;
            }, 1500); // Adjust delay (1.5s here) based on server processing time
        });
    </script>
</body>
</html>
