@extends('layouts.app')
@extends('layouts.interface')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class=" text-center ">
                    <div class="card-header">
                        <h3 class="display-6 font-weight-bold">SCHEDULE</h3>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Research Title</th>
                            <th scope="col">Course</th>
                            <th scope="col">Date of Defense</th>
                            <th scope="col">Research Panel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $datas)
                        <tr>
                            <td>{{$datas->researchTitle}}</td>
                            <td>{{$datas->course}}</td>
                            <td>{{$datas->DateofDefense}}</td>
                            <td>{{$datas->ResearchPanel}}</td>
                        </tr>
                        </tr>
                        
                    </tbody>
                    @empty
                </table>
                <tr>
                    <td colspan="number_of_columns">
                        <div style="text-align: center;">There are no data to show</div>
                    </td>
            </tr>
            @endforelse
            </div>
        </div>
    </div>
</div>

@endsection