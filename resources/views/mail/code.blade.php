
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        .code-container {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .code-box {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 24px;
            text-align: center;
            border-radius: 5px;
        }

        .message {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Hello, {{ $nombre }}!</h1>
        <p>Your confirmation code is:</p>
        <div class="code-container">
            <!-- Loop through each digit of the code and display it in separate boxes -->
            @foreach (str_split($code) as $digit)
                <div class="code-box">{{ $digit }}</div>
            @endforeach
        </div>
        <p class="message">Please enter this code to confirm your identity.</p>
    </div>
</body>
</html>
