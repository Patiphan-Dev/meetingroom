@extends('layout')
@section('body')

    <div class="row mt-5 my-5">
        <div class="card shadow">
            <section class="">
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
        </div>
    </div>
@endsection
