@extends('layouts.master')

@section('title', 'All media')

@section('content')

	<div class="content">
		<h3>All Media</h3>

		<div class="all-media">
			<select>
				<option>Egyptian</option>
				<option>Gulf</option>
				<option>Foreigners</option>
				<option>Sports</option>
				<option>Kids</option>
				<option>Animals</option>
			</select>
		</div>
		<div class="all-media-content">
			<a href="{{ url('media/add') }}">Add New Media</a>
			<ul>
				<li>
					<ul>
						<li><img src="{{ url('backend/image/1.jpg') }}" alt=""></li>
						<li class="video-name"><p>Cat Video</p></li>
						<li class="delete-media"><a href="#"><img src="{{ url('backend/image/delete.png') }}"></a></li>
						<li><p>Animals</p></li>
					</ul>
				</li>
				<li>
					<ul>
						<li><img src="{{ url('backend/image/1.jpg') }}" alt=""></li>
						<li class="video-name"><p>Cat Video</p></li>
						<li class="delete-media"><a href="#"><img src="{{ url('backend/image/delete.png') }}"></a></li>
						<li><p>Animals</p></li>
					</ul>
				</li>
				<li>
					<ul>
						<li><img src="{{ url('backend/image/1.jpg') }}" alt=""></li>
						<li class="video-name"><p>Cat Video</p></li>
						<li class="delete-media"><a href="#"><img src="{{ url('backend/image/delete.png') }}"></a></li>
						<li><p>Animals</p></li>
					</ul>
				</li>
				<li>
					<ul>
						<li><img src="{{ url('backend/image/1.jpg') }}" alt=""></li>
						<li class="video-name"><p>Cat Video</p></li>
						<li class="delete-media"><a href="#"><img src="{{ url('backend/image/delete.png') }}"></a></li>
						<li><p>Animals</p></li>
					</ul>
				</li>
				<li>
					<ul>
						<li><img src="{{ url('backend/image/1.jpg') }}" alt=""></li>
						<li class="video-name"><p>Cat Video</p></li>
						<li class="delete-media"><a href="#"><img src="{{ url('backend/image/delete.png') }}"></a></li>
						<li><p>Animals</p></li>
					</ul>
				</li>
				<li>
					<ul>
						<li><img src="{{ url('backend/image/1.jpg') }}" alt=""></li>
						<li class="video-name"><p>Cat Video</p></li>
						<li class="delete-media"><a href="#"><img src="{{ url('backend/image/delete.png') }}"></a></li>
						<li><p>Animals</p></li>
					</ul>
				</li>
				<li>
					<ul>
						<li><img src="{{ url('backend/image/1.jpg') }}" alt=""></li>
						<li class="video-name"><p>Cat Video</p></li>
						<li class="delete-media"><a href="#"><img src="{{ url('backend/image/delete.png') }}"></a></li>
						<li><p>Animals</p></li>
					</ul>
				</li>
				<li>
					<ul>
						<li><img src="{{ url('backend/image/1.jpg') }}" alt=""></li>
						<li class="video-name"><p>Cat Video</p></li>
						<li class="delete-media"><a href="#"><img src="{{ url('backend/image/delete.png') }}"></a></li>
						<li><p>Animals</p></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

@endsection