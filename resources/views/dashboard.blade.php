@extends('layouts.interface')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{url('/admin')}}">
                    <img src="UM.png" alt="logo" class="img-fluid" style="max-width: 15%;">
                </a>
                <ul class="navbar-nav">
                        <li class="nav-item active">
                     <a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a>
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
    
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <div class="row">


                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                Research Total
                                
                                <h2> {{ $data }} </h2>
                            </div>
                            <div class="card-footer d-flex align-item-center justify-content-between">
                                <a href="{{ url('/adminSchedule') }}" class="small text-white stretched-link">
                                    View Details
                                </a>
                                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                User(s) Total
                                <h2>{{ $datas }}</h2>
                            </div>
                            <div class="card-footer d-flex align-item-center justify-content-between">
                                <a href="" class="small text-white stretched-link">
                                View Details
                                </a>
                                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                Student Total
                                <h2>{{ $users }}</h2>
                            </div>
                            <div class="card-footer d-flex align-item-center justify-content-between">
                                <a href="" class="small text-white stretched-link">
                                View Details
                                </a>
                                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                Admin Total
                                <h2>{{ $user1 }}</h2>
                            </div>
                            <div class="card-footer d-flex align-item-center justify-content-between">
                                <a href="" class="small text-white stretched-link">
                                View Details
                                </a>
                                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
