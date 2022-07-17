 
<h1>Enter the OTP which is sent to your mail</h1>

    <form method="post" action="" >
    {{@csrf_field()}}

        OTP: <input type="text" name="otp" placeholder="" value=""><br>
        @error('otp')
            {{$message}}<br>
        @enderror

        <br>
        <input type="submit" value="Submit">
        
    </form>
