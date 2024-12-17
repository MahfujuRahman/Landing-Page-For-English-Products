<div class="mb-4 position-relative">
    <label for="website_id" class="form-label">Website Name</label>
    <select class="form-control" id="website_id" name="website_id" required>
        <option value="" disabled {{ !isset($data) ? 'selected' : '' }}>Select website
        </option>
        @foreach ($website as $item)
            <option value="{{ $item->id }}"
                {{ old('website_id', $website_active_id->user_website_active) == $item->id ? 'selected' : '' }}>
                {{ $item->site_name }} - {{ $item->site_url }}.{{ $item->domain_name }}
            </option>
        @endforeach
    </select>
</div>
