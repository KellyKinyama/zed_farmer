<div>
    <!-- The wire:confirm attribute forces a browser confirmation dialog before calling the method -->
    <button
        wire:click="deleteProduct"
        wire:confirm="Are you absolutely sure you want to delete this listing? This action cannot be undone."
        class="btn btn-outline-danger btn-sm rounded-pill mt-3 me-2"
        >
        <i class="fas fa-trash-alt me-1"></i> Delete Listing
    </button>
</div>
