@php
$breadcrumbs = [
  ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => false],
  ['label' => 'Helpdesk Ticket', 'route' => null, 'active' => true],
];
@endphp

<x-dashboard-layout>
  <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

  <div class="card">
    <div class="card-header py-3">
      <h3 class="card-title">Ticket #{{ $ticket->code }}</h3>

    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <p class="card-text">Status: {{ $ticket->status }}</p>
          <p class="card-text">Assigned to: {{ $ticket->technician ? $ticket->technician->name : '-' }}</p>
          <p class="card-text">Created at: {{ $ticket->created_at }}</p>
          <p class="card-text">Last updated: {{ $ticket->updated_at }}</p>
          <div class="card-text">
            <strong>Description:</strong>
            <p class="card-text">{{ $ticket->description }}</p>
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            Test
          </div>
        </div>
      </div>
    </div>
  </div>
</x-dashboard-layout>
