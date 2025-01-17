<div class='row row-form row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 row-cols-xl-4'>
    <x-form.select :options="$branches" :selected="$hospital_room->branch_id" name="branch_id" label="Branch" />
    <x-form.select :options="$buildings" :selected="$hospital_room->building_id" name="building_id" label="Building" />
    <x-form.text-input name="name" type="text" :value="$hospital_room->name" labelClass="required" label="Name"
        placeholder="name" />
    <x-form.select :options="$room_types" :selected="$hospital_room->room_type_id" name="room_type_id" label="Room Type" />
    <x-form.text-input name="phone" type="text" :value="$hospital_room->phone" labelClass="required" label="Phone"
        placeholder="Phone" />
    <x-form.text-input name="room_no" type="text" :value="$hospital_room->room_no" labelClass="required" label="Room No"
        placeholder="Room No" />
    <x-form.text-input name="details" type="text" :value="$hospital_room->details" labelClass="required" label="details"
        placeholder="details" />
</div>
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('hospital-room.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
