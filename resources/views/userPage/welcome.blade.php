<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
    <title>Welcome</title>
    <style>
        body{
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>
<body class="bg-secondary d-flex justify-content-center align-items-center">
    <div class="content text-capitalize text-center">
        <img src="/assets/img/welcome.png" alt="thanks ilustrator" class="w-80">
        <h1 class="text-2xl ">welcome to ocvs app</h1>
        <p class="text-white">{{auth()->user()->name}}</p>
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
            window.location.href ="/user/election"
        }
    }, 1000);
</script>
</html>
