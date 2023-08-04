@extends('layouts.base')

@section('content')
<div class="border rounded-lg mt-44 flex justify-evenly fade h-80 w-96 ml-448">
    <div class="flex flex-col text-justify uppercase">
        <div class="font-bold text-2xl orange mt-11">Create an account</div>
            <div class="items-center text">
                <div class="margintop">
                    
                        <div class="form-group mt-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group mt-4">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group mt-4">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group mt-4">
                            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    
                </div>
            </div>
    </div>
</div>

@endsection