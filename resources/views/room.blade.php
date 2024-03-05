@extends('layout')
@section('body')
<section class="mt-5">
    @if ($_GET['step'] == 2)
        @include('step2')
    @elseif($_GET['step'] == 3)
        @include('step3')
    @elseif($_GET['step'] == 4)
        @include('step4')
    @elseif($_GET['step'] == 5)
        @include('step5')
    @else
        @include('step1')
    @endif
</section>



@endsection
