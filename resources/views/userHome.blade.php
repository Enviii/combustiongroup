@extends('layout')

@section('content')
    <div class="container">

        <h1>Hello {{{$user[0]->email}}}</h1>

        <hr>

        {!! Form::open(['action' => 'PictureController@uploadPicture', 'files' => true, 'class' => 'form-horizontal']) !!}

            <fieldset>

                <!-- Form Name -->
                <legend>Picture Upload</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">Name</label>
                    <div class="col-md-4">
                        <input id="name" name="name" type="text" placeholder="" class="form-control input-md">

                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="description">Description</label>
                    <div class="col-md-4">
                        <textarea class="form-control" id="description" name="description">default text</textarea>
                    </div>
                </div>

                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="image">File Button</label>
                    <div class="col-md-4">
                        {{ Form::file('image') }}
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
        {!! Form::close() !!}

    </div>
    
    <div class="container">
        <div class="col-md-6">     

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pictures as $picture)
                        <tr>
                            <td>{{$picture->name}}</td>
                            <td>{{$picture->description}}</td>
                            {{-- URL::to('/') --}}
                            <td> <img src="{{URL::to('/public/images/'.$picture->user_id."-".$picture->id."-".$picture->fileName)}}" alt="{{$picture->description}}"></td>

                            <td><a href="{{ route('pictureDelete', ['pictureId' => $picture->id]) }}">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection












