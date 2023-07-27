@extends('layouts.base')

@section('content')

<div class="border rounded-lg mt-44 flex justify-evenly fade h-80 w-96 ml-448">
    <div class="flex flex-col text-justify uppercase">
        <div class="font-bold text-2xl orange mt-11">Login to your account</div>
        <div class="items-center text">
                <form>
                                <div class="margintop">
                                    <label for="uname"><b> Username </b></label>
                                    <input type="text" placeholder="Enter Username" name="uname" required>
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
                                    <button type="submit"> <a href="/"> <span class="text-black"> Login </a> </span> </button>            
                                </div>
                                <span class="psw ">Forgot <a href="#">password?</a></span>
            
                </form>
        </div>
    </div>
</div>

@endsection