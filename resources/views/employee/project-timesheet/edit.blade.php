@extends('layouts.employee_dashboard')

@section('title', 'Project-Group-Create')

@section('sidebar')
    @parent

@endsection

@section('content')

       
@livewire('project-timesheet.edit',['timesheet'=>$timesheet])


@endsection