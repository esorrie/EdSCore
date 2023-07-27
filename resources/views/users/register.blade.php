@extends('layouts.base')

@section('content')

<div class="border rounded-lg mt-44 flex justify-evenly fade h-96 w-96 ml-448">
    <div class="flex flex-col text-justify uppercase">
        <div class="font-bold text-2xl orange mt-14 "> Create an account</div>
        <div class="items-center text">
                <form>
                                <div class="margintop">
                                    <label for="uname"><b> Username </b></label>
                                    <input type="text" placeholder="Enter Username" name="uname" required>
                                </div>
                                <div class="margintop">
                                    <label for="email"><b> Email </b></label>
                                    <input type="text" placeholder="Enter Email" name="email" required>
                                </div>
                                <div class="margintop">
                                    <label for="psw"><b> Password </b></label>
                                    <input type="password" placeholder="Enter Password" name="psw" required>
                                </div>

                                <div class="orange mt-2.5">
                                    <label>
                                    <input type="checkbox" unchecked="checked" name="remember"> Remember me
                                    </label>
                                </div>
                                <div class="my-2.5">
                                    <button type="submit"> <a href="/"></a>Register</button>            
                                </div>
                                <span class="psw ">Forgot <a href="#">password?</a></span>
            
                </form>
        </div>
    </div>
</div>

@endsection