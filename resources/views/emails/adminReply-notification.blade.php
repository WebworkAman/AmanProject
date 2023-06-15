<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新問題提交(CRM)</title>
    <style>
    /* 通用樣式 */
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
    }
    h1 {
        color: #333;
    }
    p {
        color: #777;
    }

    /* 自訂樣式 */
    .custom-heading {
        font-size: 24px;
        color: #ff0000;
    }
    .custom-content {
        font-size: 16px;
    }
    .custom-button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
    }
</style>
</head>
<body>

<h1>{{ $greeting }}</h1>

<p>您的問題已獲得回覆。</p>
<p>問題標題：{{ $question->title }}</p>

<p>感謝您的支持！</p>
</body>
</html>
