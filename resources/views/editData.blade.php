@extends('layouts.interface')

<div class="container">
    <div class="col-md-12">
        <form method="GET" enctype="multipart/form-data">
            @csrf
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Research Title</th>
                        <th scope="col">Date of Defense</th>
                        <th scope="col">Time of Defense</th>
                        <th scope="col">Research Panel</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="researchTitle"></label>
                                <input type="text" class="form-control" name="researchTitle" id="researchTitle" aria-describedby="researchTitle" autocomplete="off" value="">
                                @error('researchTitle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="DateOfDefense"> </label>
                                <input type="date" class="form-control" name="DateOfDefense" id="DateOfDefense" aria-describedby="DateOfDefense" value="">
                                @error('DateOfDefense')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <label for="TimeOfDefense">  </label>
                                <input type="time" class="form-control" name="TimeOfDefense" id="TimeOfDefense" aria-describedby="TimeOfDefense" value="">
                                @error('TimeOfDefense')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </td>


                        <td>
                            <div class="form-group">
                                <label for="ResearchPanel"></label>
                                <input type="text" class="form-control" name="ResearchPanel" id="ResearchPanel" aria-describedby="ResearchPanel" value="">
                                @error('ResearchPanel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignModal">Submit</button>
                        </td>           
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
