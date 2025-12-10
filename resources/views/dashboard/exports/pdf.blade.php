<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Curriculum Vitae - {{ $user->name }}</title>

	<style>
		body {
			font-size: 0.875rem;
			line-height: 1.25rem;
			font-family: 'Times New Roman', 'Times', 'serif';
			color: rgba(0, 0, 0, 1);
			background-color: white;
		}

		a {
			text-decoration: none;
			color: rgb(0, 0, 0);
		}

		h3 {
			text-align: center;
		}

		figure {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin-bottom: 0.75rem;
			text-align: center;
		}

		figure img {
			margin-left: auto;
			margin-right: auto;
			display: block;
		}

		#figure .explain {
			text-align: center;
		}

		#summary p {
			text-align: left;
		}

		#experiences {
			text-align: center;
		}

		#educations {
			text-align: center;
		}

		#educations h4 {
			text-transform: uppercase;
		}

		#degree {
			text-transform: capitalize;
		}
	</style>
</head>
<body>
	<header id="figure">
		<figure>
			<img src="{{ 'storage/' . $user->profile_picture }}" alt="{{ $user->username }}" width="100">
			<figcaption>{{ $user->name }}</figcaption>
		</figure>
		<h1 class="explain">{{ $user->name }}</h1>
		<p class="explain">Email: {{ $user->email }}</p>
	</header>

	<main>
		<section>
			<article id="summary">
				<h3>Summary</h3>
				<p>{{ htmlspecialchars($user->bio) }}</p>
			</article>

			<article id="personal">
				<h3>Personal Data</h3>
				<ul>
					<li>Name: {{ $user->name }}</li>
					<li>Gender: {{ $user->gender }}</li>
					<li>Place of birth: {{ $user->place_of_birth }}</li>
					<li>Date of birth: {{ Carbon\Carbon::parse($user->date_of_birth)->format('d M Y') }}</li>
					<li>Address: {{ $user->address }}</li>
					<li>Skills: {{ $user->skills }}</li>
				</ul>
			</article>

			<article id="contact">
				<h3>Contact Information</h3>
				<ul>
					<li>Email: {{ $user->email }}</li>
					<li>Phone: {{ $user->phone_number }}</li>
					<li>Social media: 
						<ul>
						@foreach (json_decode($user->social_links, true) as $link)
							@if ($link['platform'] == 'x')
								<li><a href="{{ $link['link'] }}">{{ $link['platform'] }}</a></li>
							@elseif ($link['platform'] == 'linkedin')
								<li><a href="{{ $link['link'] }}">{{ $link['platform'] }}</a></li>
							@elseif ($link['platform'] == 'github')
								<li><a href="{{ $link['link'] }}">{{ $link['platform'] }}</a></li>
							@endif
						@endforeach
						</ul>
					</li>
				</ul>
			</article>

			<article id="experiences">
				<h3>Work Experiences</h3>
				@foreach (json_decode($user->work_experiences, true) as $work)
					<details>
						<summary><strong>{{ $work['position'] }}</strong> - {{ $work['company'] }}</summary>
						<p>{{ htmlspecialchars($work['description']) }}</p>
						<p>From {{ Carbon\Carbon::parse($work['start_date'])->format('F Y') }} to {{ Carbon\Carbon::parse($work['end_date'])->format('F Y') }}</p>
					</details>
				@endforeach
			</article>

			<article id="educations">
				<h3>Educations</h3>
				@foreach (json_decode($user->educations, true) as $education)
					<div>
						@if (! empty($education['link']))
							<h4><a href="{{ $education['link'] }}">{{ $education['institution'] }}</a></h4>		
						@else
							<h4>{{ $education['institution'] }}</h4>							
						@endif
						@if ($education['degree'] != 'none')
							<p id="degree">{{ $education['degree'] }}</p>
						@endif
						<p>Started {{ Carbon\Carbon::parse($education['start_date'])->format('F Y') }} and graduated {{ Carbon\Carbon::parse($education['end_date'])->format('F Y') }}</p>
					</div>
				@endforeach
			</article>
		</section>
	</main>
</body>
</html>