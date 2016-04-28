@extends('layoutBack')

@section('content')
{!! $table->render() !!}
@endsection

@section('scripts')
    <script src="{{asset('js/forms.js')}}"></script>
@endsection