<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/registrasi" method="post">
        @csrf 
        <label for="">nama</label>
        <input type="text" name="name" class="form-control" id="name" ><br/>

        <label for="">email</label>
        <input type="email" name="email" class="form-control" id="email"><br/>

        <label for="">Password</label>
        <input type="password" class="form-control" name="password" id="password"><br/>

        <button cllas="btn btn-primary" type="submit">Bikin User</button>


    </form>
    
</body>
</html>