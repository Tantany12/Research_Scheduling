@extends('layouts.interface')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ url('admin') }}">
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
    </div>
</div>


<div class="container mt-4" style ="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="text-center">
                    <div class="card-header">
                        <h3 class="display-6 font-weight-bold">SCHEDULE</h3>
                    </div>
                </div>
                @if(Session::has('success_message'))
                <div class="alert alert-success alert-block text-center">
                    <strong>{{ Session::get('success_message') }}</strong>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm" style = "text-align:center;" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Research Title</th>
                                <th class="th-sm">Course</th>                                          
                                <th class="th-sm">Original Name</th>
                                <th class="th-sm">File Name</th>
                                <th class="th-sm">Date of Defense</th>
                                <th class="th-sm">Time of Defense</th>
                                <th class="th-sm">Research Panel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($researchData as $research)
                            <tr>
                                <td>{{ $research->researchTitle }}</td>
                                <td>{{ $research->course }}</td>
                                <td>{{ $research->original_name }}</td>
                                <td>{{ $research->file_path }}</td>
                                <td>{{ $research->DateofDefense }}</td>
                                <td>{{ $research->TimeOfDefense }}</td>
                                <td>{{ $research->ResearchPanel }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">
                                    <div style="text-align: center;">There is no data to show</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination links using Bootstrap CSS -->
                <div class="d-flex justify-content-end">
                    {{ $researchData->links() }}
                </div>
            </div>
        </div>
    </div>
</div>