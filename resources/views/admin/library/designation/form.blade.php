@row
    <x-form.text-input name="name" type="text" :value="$designation->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.select :options="$grades" :selected="$designation->grade_id" name="grade_id" label="Grade" />
    <x-form.text-input name="description" type="text" :value="$designation->description" labelClass="required" label="Description"
        placeholder="description" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('designation.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
