@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Clockings</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if ($clockings->isEmpty())
    <p>No clockings yet.</p>
    @else
    <ul>
        @foreach ($clockings as $clocking)
        <li>{{ $clocking->clock_in }} @if ($clocking->clock_out) - {{ $clocking->clock_out }} @endif</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('clockings.clock-in') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Clock In</button>
    </form>

    <form action="{{ route('clockings.clock-out') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Clock Out</button>
    </form>
</div>
@endsection