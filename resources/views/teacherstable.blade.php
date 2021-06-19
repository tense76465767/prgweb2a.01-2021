@extends('layouts.master')
@section('title', 'Teachers List')

@section('content')
<h2>Teachers List</h2>

<form action="/teachers" method="GET">
    <label for="txtFirstName">First name</label>
    <input id="txtFirstName" name="firstName" value="{{ $firstName }}" />
    <label for="txtLastName">Last name</label>
    <input id="txtLastName" name="lastName" value="{{ $lastName }}" />
    <label for="txtCity">City</label>
    <input id="txtCity" name="city"  value="{{ $city }}" />
    <label for="txtSemester">Address</label>
    <input id="txtAddress" name="address" value="{{ $address }}" />
    <label for="txtSemester">Salary</label>
    <input id="txtSalary" name="salary" value="{{ $salary }}" />
    <input type="submit" value="Search" />
</form>

<table class="table table-dark table-striped table-hover">
    <thead>
        <tr>
            <th>
                First name
            </th>
            <th>
                Last name
            </th>
            <th>
                City
            </th>
            <th>
                Address
            </th>
            <th>
                Salary
            </th>
        </tr>
    </head>
    <tbody>
        @foreach ($teachers as $teacher)
        <tr>
            <td>
                {{ $teacher->firstName }}
            </td>
            <td>
                {{ $teacher->lastName }}
            </td>
            <td>
                {{ $teacher->city }}
            </td>
            <td>
                {{ $teacher->address }}
            </td>
            <td>
                {{ $teacher->salary }}
            </td>
            <td>
                <a href="/teachers/{{ $teacher->id }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/teacheradd" class="btn btn-dark">New Teacher</a>
@stop