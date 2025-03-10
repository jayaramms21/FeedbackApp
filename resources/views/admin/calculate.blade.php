@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Calculate Faculty & Course Ratings</h2>
    <p>Click the button below to calculate faculty and course ratings.</p>

    <form action="{{ route('admin.calculate-ratings') }}" method="GET">
    <button type="submit" class="btn btn-primary">Calculate Ratings</button>
</form>

</div>
@endsection
