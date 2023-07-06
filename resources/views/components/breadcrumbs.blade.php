@props(['breadcrumbs'])

<div class="d-md-flex align-items-center justify-content-between mb-4">
  <div>
    <ol class="breadcrumb fs-sm mb-1">
      @foreach($breadcrumbs as $breadcrumb)
        <li class="breadcrumb-item{{ $breadcrumb['active'] ? ' active' : '' }}">
          @if($breadcrumb['active'])
            {{ $breadcrumb['label'] }}
          @else
            <a href="{{ route($breadcrumb['route']) }}">{{ $breadcrumb['label'] }}</a>
          @endif
        </li>
      @endforeach
    </ol>
  </div>
</div>
