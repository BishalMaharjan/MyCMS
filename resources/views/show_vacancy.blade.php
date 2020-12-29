
@extends('layouts.main')
@section('content')


<main class="event-single-page">
		<div class="content">
			<div class="section-rule">
				<div class="row">

					<div class="col-12 col-lg-8">
						<article class="blog">
                            <h1 class="section-title">{{ $vacancy->vacancy_title }}</h1>
                            <h1 class="section-title">Position:{{ $vacancy->vacancy_position }}</h1>
                            <p class="date">Deadline on: {{ $vacancy->vacancy_deadline }}</p>
                            <p class="date">Email: {{ $vacancy->vacancy_email }}</p>
                            <p class="date">Number {{ $vacancy->vacancy_number }}</p>
                            <p class="date">Status: {{ $vacancy->vacancy_status }}</p>
            
                            <h1 >Skill Required</h1>
                            <aside class="paragraph">
								{!! $vacancy->vacancy_skill !!}
							</aside>
                            <h1 >Description</h1>
							<aside class="paragraph">                              
								{!! $vacancy->vacancy_description !!}
                            </aside>
							
						</article>
						
                    </div>
                              
				
				



                                
			
				</div>
			</div>
		</div>

		

	</main>




    
    @endsection