@if ($paginator->hasPages())
	<div class="am-u-lg-12 am-cf">
		<div class="am-fr">
			<ul class="am-pagination tpl-pagination">
				{{-- Previous Page Link --}}
				@if ($paginator->onFirstPage())
					<li class="am-disabled"><a>&laquo;</a></li>
				@else
					<li class=""><a href="{{ $paginator->previousPageUrl() }}">&laquo;</a></li>
				@endif

				{{-- Pagination Elements --}}
				@foreach ($elements as $element)
					{{-- "Three Dots" Separator --}}
					@if (is_string($element))
						<li class="am-disabled"><span>{{ $element }}</span></li>
					@endif

					{{-- Array Of Links --}}
					@if (is_array($element))
						@foreach ($element as $page => $url)
							@if ($page == $paginator->currentPage())
								<li class="am-active"><a>{{ $page }}</a></li>
							@else
								<li><a href="{{ $url }}">{{ $page }}</a></li>
							@endif
						@endforeach
					@endif
				@endforeach

				{{-- Next Page Link --}}
				@if ($paginator->hasMorePages())
					<li class=""><a href="{{ $paginator->nextPageUrl() }}">&raquo;</a></li>
				@else
					<li class="am-disabled"><a>&raquo;</a></li>
				@endif
			</ul>
		</div>
	</div>
@endif
