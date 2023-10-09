@extends('layouts.app')
@extends('layouts.interface')
@section('content')
<div class="container">
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
                                <td>  
                                <a href="{{ route('view-pdf', ['filename' => $research->file_path]) }}" style = "color: black;">
                                    <div class="text-center">
                                    {{$research -> file_path}}  <i class="fas fa-eye" style = "color: black;"></i>
                                    </div>
                                </a>
                                </td>
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
@endsection
