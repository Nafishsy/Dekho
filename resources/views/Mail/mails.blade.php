<html>
    <form method="post" action="" enctype="multipart/form-data">
        
    {{@csrf_field()}}
        Name: <input type="text" name="name" placeholder="Name" value="{{old('name')}}"><br>
        @error('name')
            {{$message}}<br>
        @enderror

        Email: <input type="text" name="email" placeholder="email" value="{{old('description')}}"><br>
        @error('email')
            {{$message}} <br>
        @enderror

        Subject: <input type="text" name="subject" placeholder="subject" value="{{old('description')}}"><br>
        @error('subject')
            {{$message}} <br>
        @enderror

        Message: <input type="text" name="message" placeholder="message" value="{{old('description')}}"><br>
        @error('message')
            {{$message}} <br>
        @enderror

        <br>
        <input type="submit" value="Send">
        
    </form>
</html>