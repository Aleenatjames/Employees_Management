@extends('layouts.employee_dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @parent
 
   
@endsection

@section('content')
       
<div class="h-full ml-14  md:ml-64 mt-0 bg-gray-100 dark:bg-gray-700">
      
 @livewire('dashboard')
</div> 


@endsection