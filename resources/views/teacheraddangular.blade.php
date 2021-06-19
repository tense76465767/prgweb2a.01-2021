@extends('layouts.master')
@section('title', 'New Teacher')

@section('content')
<script type="text/javascript">
    var app = angular.module('TeacherAddModule', []);
    app.controller('TeacherAddController', ($scope, $http) => {
        $scope.teacher = {};

        $scope.addTeacher = () => {
            $http.post('/ajaxteachers', $scope.teacher).then((result) => {
                console.log(result);
            })
        }
    })
</script>
<div class="container pl-5 pr-5" ng-app="TeacherAddModule" ng-controller="TeacherAddController">
    <h2>{{ $pagetitle }}</h2>
    <p>
        @{{ teacher.firstName }}
    </p>
    <form action="/teachers" method="POST">
        @csrf
        <div class="form-group">
            <label for="txtFirstName">First name</label>
            <input type="text" class="form-control" id="txtFirstName" name="firstName" ng-model="teacher.firstName" />
        </div>
        <div class="form-group">
            <label for="txtLastName">Last name</label>
            <input type="text" class="form-control" id="txtLastName" name="lastName" ng-model="teacher.lastName" />
        </div>
        <div class="form-group">
            <label for="txtCity">City</label>
            <input type="text" class="form-control" id="txtCity" name="city" ng-model="teacher.city" />
        </div>
        <div class="form-group">
            <label for="txtAddress">Address</label>
            <input type="text" class="form-control" id="txtAddress" name="address" ng-model="teacher.address" />
        </div>
        <div class="form-group">
            <label for="txtSalary">Salary</label>
            <input type="text" class="form-control" id="txtSalary" name="salary" ng-model="teacher.salary" />
        </div>
        <input type="button" value="Send" class="btn btn-dark" ng-click="addTeacher()" />
        <a href="/teachers" class="btn btn-dark">Back</a>
    </form>
</div>
@stop