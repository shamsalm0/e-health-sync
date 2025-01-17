@row
    <x-form.text-input name="name" type="text" :value="$symptom->name" labelClass="required" label="Name" placeholder="name" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('symptom.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
