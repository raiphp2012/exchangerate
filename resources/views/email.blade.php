
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-4">
        <h2> Email Verification</h2>

        @if (\Session::has('success'))
            <div class="alert alert-success">
                
                    <p>{!! \Session::get('success') !!}</p>
                
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{route('email.store')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter Email" class="form-control"/>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" value="Send Email" class="btn btn-success"/>
                </div>
            </form>
        </div>
        <div class="cold-md-8">
            <div id="calendar"></div>
        </div>
    </div>
</div>
@endsection