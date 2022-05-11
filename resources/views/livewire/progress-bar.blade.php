<div @if(! $stopPolling) wire:poll.keep-alive @endif>
    <span class="text-xs font-semibold">{{ $this->status_for_human }}</span>

    @if((int) $this->progress->status === \App\Models\ProgressProductUpload::PENDING || (int) $this->progress->status === \App\Models\ProgressProductUpload::PROCESSING )
        <div class="flex items-center space-x-2">
            <div class="bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 w-full">
                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $this->percentage }}"></div>
            </div>
            <p>{{ $this->percentage }}</p>
        </div>
    @endif
</div>
