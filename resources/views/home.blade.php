@extends('layouts.interface')
<div class="container">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg">
            <img src="UM.png" alt="logo" class="rounded-circle mx-auto d-block" style="width:15%;">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/seeSchedule')}}">Schedule</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown " class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container mt-4 my-main-form">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class=" text-center ">
                            <div class="card-header bg-light">
                                <h3 class="display-6">RESEARCH SCHEDULING FORM</h3>
                            </div><br>
                        </div>
                        <strong>
                            <p>Fill in necessary details to set schedule.</p>
                        </strong>
                        <div class="container-fluid">
                        <form method="POST" action="{{ route('datas.store') }}" enctype="multipart/form-data">

                                @csrf
                                <div class="form-group">
                                    <label for="researchTitle"> </label>
                                    <strong>Research Title: </strong><input type="text" class="form-control" name="researchTitle" id="researchTitle" aria-describedby="researchTitle" placeholder="Enter Title" autocomplete="off">

                                    @error('researchTitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="course"> </label>
                                    <strong>Course: </strong>
                                    <input type="text" class="form-control" name="course" id="course" aria-describedby="course" placeholder="Enter course" autocomplete="off">

                                    @error('course')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="file"> </label>
                                    <strong>Research File: </strong>
                                    <input type="file" class="form-control" name="file" id="file" aria-describedby="file" placeholder ="">

                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="researcherName"> </label>
                                    <strong>Researcher's Name: </strong><input type="text" class="form-control" name="researcherName" id="researcherName" aria-describedby="researcherName" placeholder="Representative Only" autocomplete="off">

                                    @error('researcherName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail"></label>
                                    <strong>Email address: </strong><input type="email" class="form-control" name="exampleInputEmail" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off">

                                    @error('exampleInputEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="contactNumber"> </label>
                                    <strong>Contact Number: </strong> <input type="text" class="form-control" name="contactNumber" id="contactNumber" aria-describedby="contactNumber" placeholder="" autocomplete="off">

                                    @error('contactNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button class=" col-4 btn btn-primary float-right" type="submit" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
