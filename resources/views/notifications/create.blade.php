<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create notifications</h1>
    <div></div>
    <form method="post" action="{{route('notification.store')}}">
        @csrf 
        @method('post')
        <div class="form-group">
            <label for="">Title</label>
            <input 
                type="text"
                class="form-control" 
                name="title" 
                id="title" 
                aria-describedby="helpId" 
                placeholder="título"
            />
            <label for="">Text</label>
            <input 
                type="text"
                class="form-control" 
                name="text" 
                id="text" 
                aria-describedby="helpId" 
                placeholder="texto"
            />
            <di>
                <input type="submit" value="Save notification"/>
            </div>
        </div>
    </form>
</body>
</html>