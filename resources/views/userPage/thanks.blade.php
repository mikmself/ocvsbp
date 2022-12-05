<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
    <title>Thank you for choosing</title>
    <style>
        body{
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>
<body class="bg-secondary d-flex justify-content-center align-items-center">
    <div class="content text-capitalize text-center">
        <img src="/assets/img/thanks.png" alt="thanks ilustrator" class="w-60">
        <h1 class="text-2xl ">Thank you for exercising your right to vote.</h1>
        <p class="text-white">Your voice will be very useful to bring about the next change.</p>
        <br>
        <br>
        <p class="text-danger">you will be redirected in <span id="counter">3</span> seconds</p>
    </div>
</body>
<script>
    let counter = document.getElementById("counter");
    let number = counter.textContent;
    setInterval(() => {
        counter.textContent = number;
        if(number != -1){
            number--;
        }
        if(number < 0){
            window.location.href ="/logout"
        }
    }, 1000);
</script>
</html>
