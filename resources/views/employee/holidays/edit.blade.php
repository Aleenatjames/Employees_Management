@extends('layouts.employee_dashboard')

@section('title', 'Holiday Edit')

@section('sidebar')
    @parent
 
   
@endsection

@section('content')
       
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    
 @livewire('holiday.edit',['holidayId' => $holidayId])
</div> 


@endsection