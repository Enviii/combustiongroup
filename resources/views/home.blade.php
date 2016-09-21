@extends('layout')

@section('content')
    <div class="container">

        <form action="{{ action('UserController@createUser') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <fieldset>

                <!-- Form Name -->
                <legend>Create User</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Email</label>
                    <div class="col-md-4">
                        <input id="email" name="email" type="email" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="passwordinput">Password</label>
                    <div class="col-md-4">
                        <input id="passwordinput" name="passwordinput" type="password" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button id="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </fieldset>
        </form>


    </div>

@endsection