<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        table {
            border-spacing: 0;
        }
        td {
            padding: 0;
        }
        img {
            border: 0;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f4f4f4;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .main {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #a63438;
            padding: 20px;
            color: white;
            text-align: center;
        }
        .content {
            padding: 20px;
            text-align: left;
            line-height: 1.6;
        }
        .content p {
            margin: 0 0 10px;
        }
        .footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main">
            
            <div class="header">
                <h1>{{ $subject }}</h1>
            </div>
            <div class="content">
            <p>Email: {!! $email !!}</p>
            <p>{!! $description !!}</p>
            </div>
        </div>
        <div class="footer">
            <p>Radio.tn &copy; {{ date('Y') }}</p>
        </div>
    </div>
</body>
</html>
