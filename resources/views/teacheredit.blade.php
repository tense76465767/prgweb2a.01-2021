@extends('layouts.master')
@section('title', 'Edit Teacher')
@section('content')
<div class="container">
    <h2>Edit Teacher</h2>
    {{ Form::open(array('url' => '/teachers', 'method' => 'PUT')) }}
        @csrf
        <input type="hidden" name="id" value="{{ $teacher->id }}" />
        <div>
            <label for="txtFirstName">First name</label>
            <input type="text" id="txtFirstName" name="firstName" value="{{ $teacher->firstName }}" />
        </div>
        <div>
            <label for="txtLastName">Last name</label>
            <input type="text" id="txtLastName" name="lastName" value="{{ $teacher->lastName }}" />
        </div>
        <div>
            <label for="txtCity">City</label>
            <input type="text" id="txtCity" name="city" value="{{ $teacher->city }}" />
        </div>
        <div>
            <label for="txtAddress">Address</label>
            <input type="text" id="txtAddress" name="address" value="{{ $teacher->address }}" />
        </div>
        <div>
            <label for="txtSalary">Salary</label>
            <input type="text" id="txtSalary" name="salary" value="{{ $teacher->salary }}" />
        </div>
        <input type="submit" value="Send" />
    {{ Form::close() }}
</div>
@stop