<div>
    <div class="p-4 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Report Details</h1>
        <p><strong>Ticket ID:</strong> {{ $report->ticket_id }}</p>
        <p><strong>Chronology:</strong></p>
        <p>{{ $report->chronology }}</p>

        <h2 class="text-xl font-bold mt-4">Evidence</h2>
        <ul>
            @foreach($report->evidence as $evidence)
                <li>
                    {{ $evidence->original_name }}
                    <button wire:click="viewEvidence({{ $evidence->id }})" class="text-blue-500 hover:underline">View</button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
