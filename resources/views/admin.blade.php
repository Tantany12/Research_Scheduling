@extends('layouts.interface')
<head>
    <div class="container">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <img src="UM.png" alt="logo" class=" mx-auto d-block" style="width:15%;">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
</head>
<body>
<div class="container">
    @if(Session::has('success_message'))
    <div class="alert alert-success alert-block text-center">
        <strong>{{ Session::get('success_message') }}</strong>
    </div>
    @endif
    <div class="table-responsive table-responsive-sm"> <!-- Apply responsive class for small screens -->
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" style="text-align:center; margin-top:30px;" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th scope="col">Research Title</th>
                    <th scope="col">Researcher's Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">File Name</th>
                    <th scope="col">Date of Defense</th>
                    <th scope="col">Time of Defense</th>
                    <th scope="col">Research Panel</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($researchData as $research)
                <tr>
                    <td>{{ $research->researchTitle }}</td>
                    <td>{{ $research->researcherName }}</td>
                    <td>{{ $research->course }}</td>
                    <td>{{ $research->file_path }}</td>
                    <td>{{ $research->DateofDefense }}</td>
                    <td>{{ $research->TimeOfDefense }}</td>
                    <td>{{ $research->ResearchPanel }}</td>
                    <td>
                        <form method="POST" action="{{ route('delete', $research->id) }}">
                            <!-- Button trigger modal -->
                            @csrf
                            <button type="button" class="btn btn-primary assign-button" data-toggle="modal" data-target="#exampleModal">Edit</button>
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="number_of_columns">
                        <div style="text-align: center;">There is no data to show</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Research Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id = "editForm" action ="{{ route('updateData', $research->id) }}" method = "POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">researchTitle</label>
                            <input type="text" class="form-control" id="researchTitle" name = "researchTitle" value="{{ $research->researchTitle  }}" >
                        </div>
                        <div class="mb-3">
                            <label for="researchTitle" class="form-label">Research Title</label>
                            <input type="text" class="form-control" id="researchTitle" name = "researchTitle" value="{{ $research->researchTitle }}" >
                        </div>
                        <div class="mb-3">
                            <label for="researcherName" class="form-label">Researcher's Name</label>
                            <input type="text" class="form-control" id="researcherName" name = "researcherName" value="{{ $research->researcherName }}" >
                        </div>
                        <div class="mb-3">
                            <label for="course" class="form-label">Course</label>
                            <input type="text" class="form-control" id="course" name = "course" value="{{ $research->course }}" >
                        </div>
                        <div class="mb-3">
                            <label for="file_path" class="form-label">File Name</label>
                            <input type="text" class="form-control" id="file_path" name = "file_path" value="{{ $research->file_path }}" >
                        </div>
                        <div class="mb-3">
                            <label for="DateofDefense" class="form-label">Date of Defense</label>
                            <input type="date" class="form-control" id="DateofDefense" name = "DateofDefense" value="{{ $research->DateofDefense }}" >
                        </div>
                        <div class="mb-3">
                            <label for="TimeOfDefense" class="form-label">Time of Defense</label>
                            <input type="time" class="form-control" id="TimeOfDefense"  name = "TimeOfDefense" value="{{ $research->TimeOfDefense }}">
                        </div>
                        <div class="mb-3">
                            <label for="ResearchPanel" class="form-label">Research Panel</label>
                            <input type="text" class="form-control" id="ResearchPanel" name = "ResearchPanel" value="{{ $research->ResearchPanel }}" >
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Assign</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var researchData = JSON.parse(button.data('research'));

            var modal = $(this);
            modal.find('#researchTitle').val(researchData.researchTitle);
            // Populate other form fields similarly
        });

        // Attach a click event handler to the "Assign" button in the modal
        $('#exampleModal').on('click', '.btn-primary', function() {
            // Assuming you want to submit the form with id 'editForm' when the "Assign" button is clicked
            $('#editForm').submit();
        });
    });
</script>


</body>
