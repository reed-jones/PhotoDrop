@extends('layouts.app')

@section('content')
<div>
	<div class="welcome">
		<div class="container ">
			<div class="row">
				<div class="col-12">
					<h1>Erin and Reed's Wedding</h1>
					<p>August 26th, 2017</p>
				</div>
			</div>
		</div>
	</div>
    <div class="image-box">
    @foreach($media as $item)
        @if($item->type === 'image')
            <photo-square image="{{ $item->path }}"></photo-square>
        @elseif($item->type === 'video')
            <video-square video="{{ $item->path }}"></video-square>
        @endif
    @endforeach
    </div>
</div>
@endsection