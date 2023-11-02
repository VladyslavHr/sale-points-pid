@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2 class="col-lg-4">Hi world</h2>
        <h2 class="col-lg-4">Time now {{$currentFormattedTime}}</h2>
        <h2 class="col-lg-4">{{ count($salePoints) }}</h2>
    </div>


    <div class="row py-5">
        <form action="{{ route('salePoints.index') }}" method="GET" class="btn-group col-lg-6" role="group" aria-label="Basic checkbox toggle button group">
            @csrf
            <input type="checkbox" class="btn-check" id="open_points" name="chekOpenPoints" value="1" autocomplete="off">
            <label class="btn btn-outline-primary" for="open_points">Open now</label>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <form action="{{ route('salePoints.index') }}" method="GET" class="btn-group col-lg-6" role="group" aria-label="Basic checkbox toggle button group">
            @csrf
            <input type="datetime-local" class="form-control" name="chooseDateTime">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="row">


        {{-- {{ $salePoints->links('pagination::bootstrap-5') }} --}}
        {{-- <nav>
            <ul class="pagination">
                <li class="page-item {{ $salePoints->previousPageUrl() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $salePoints->previousPageUrl() }}">Previous</a>
                </li>

                @if($salePoints->currentPage() > 3)
                    <li class="page-item"><a class="page-link" href="{{ $salePoints->url(1) }}">1</a></li>
                @endif
                @if($salePoints->currentPage() > 4)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif
                @foreach(range(1, $salePoints->lastPage()) as $i)
                    @if($i >= $salePoints->currentPage() - 2 && $i <= $salePoints->currentPage() + 2)
                        <li class="page-item {{ ($salePoints->currentPage() == $i) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $salePoints->url($i) }}">{{ $i }}</a>
                        </li>
                    @endif
                @endforeach
                @if($salePoints->currentPage() < $salePoints->lastPage() - 3)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif
                @if($salePoints->currentPage() < $salePoints->lastPage() - 2)
                    <li class="page-item"><a class="page-link" href="{{ $salePoints->url($salePoints->lastPage()) }}">{{ $salePoints->lastPage() }}</a></li>
                @endif

                <li class="page-item {{ $salePoints->nextPageUrl() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $salePoints->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav> --}}
          {{-- {{$salePoints->links()}} --}}
        @foreach ($salePoints as $point)
        @if(count($point->open_hours) > 0)
            <div class="col-lg-3">
                <span>
                    point id name
                    <b>{{$point->sale_point}}</b>
                </span>
                <div>
                    @foreach ($point->open_hours as $open_hour)
                    <div>
                        open hours id
                        <b>{{$open_hour->id}}</b>
                    </div>
                    <div>
                        sale point id
                        <b>{{$open_hour->sale_point_id}}</b>
                    </div>
                    <div>
                        day from
                        <b>{{$open_hour->day_from}}</b>
                    </div>
                    <div>
                        day to
                        <b>{{$open_hour->day_to}}</b>
                    </div>
                    <div>
                        open hours
                        <b>{{$open_hour->hours}}</b>
                    </div>

                    @endforeach
                </div>
                <hr>
            </div>
        @endif
        @endforeach
        {{-- {{ $salePoints->links('pagination::bootstrap-5') }} --}}

    </div>

</div>
@endsection
