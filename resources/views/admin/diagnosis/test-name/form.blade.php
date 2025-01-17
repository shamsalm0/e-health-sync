@row
    <x-form.text-input name="name" type="text" :value="$test_name->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.select :options="$groups" :selected="$test_name->test_group_id" name="test_group_id" label="Test Group" />
    <x-form.text-input name="cost" type="text" :value="$test_name->cost" labelClass="" label="Cost" placeholder="Cost" />
    <x-form.select :options="$departments" :selected="$test_name->department_id" labelClass="" name="department_id" label="Department" />
    <x-form.select :options="$lab_rooms" :selected="$test_name->lab_room_id" labelClass="" name="lab_room_id" label="Lab Room" />
    <x-form.select :options="$sample_rooms" :selected="$test_name->sample_room_id" labelClass="" name="sample_room_id" label="Sample Room" />
    <x-form.text-input name="delivery_time" type="number" :value="$test_name->delivery_time" labelClass="" label="Delivery time"
        placeholder="Delivery Time" />
    <x-form.select :options="$report_types" :selected="$test_name->report_type_id" labelClass="" name="report_type_id" label="Report Type" />
    <x-form.text-input name="free_amount" type="number" :value="$test_name->free_amount" labelClass="" label="Free Amount"
        placeholder="Free Amount" />
    <x-form.select :options="$uoms" :selected="$test_name->uom_id" labelClass="" name="uom_id" label="uom" />    
@endrow

<div class='row row-form row-cols-3 row-cols-md-6 row-cols-lg-12 g-1'>
    <x-form.checkbox id="is_sample" name="is_sample" label="is sample" :checked="$test_name->is_sample" />
    <x-form.checkbox id="is_level_print" name="is_level_print" label="is lavel print" :checked="$test_name->is_level_print" />
    <x-form.checkbox id="is_ticket_show" name="is_ticket_show" label="is ticke show" :checked="$test_name->is_ticket_show" />
    <x-form.checkbox id="is_discount" name="is_discount" label="is discount" :checked="$test_name->is_discount" />
    <x-form.checkbox id="is_attribute_group" name="is_attribute_group" label="is attribute group" :checked="$test_name->is_attribute_group" />
    <x-form.checkbox id="is_title_show" name="is_title_show" label="is title show" :checked="$test_name->is_title_show" />
    <x-form.checkbox id="is_unit_show" name="is_unit_show" label="is unit show" :checked="$test_name->is_unit_show" />
    <x-form.checkbox id="is_normal_unit" name="is_normal_unit" label="is normal unit" :checked="$test_name->is_normal_unit" />
    <x-form.checkbox id="is_normal_no_unit" name="is_normal_no_unit" label="is normal no unit" :checked="$test_name->is_normal_no_unit" />
    <x-form.checkbox id="is_dialysis" name="is_dialysis" label="is dialysis" :checked="$test_name->is_dialysis" />
    <x-form.checkbox id="is_physiotherapy" name="is_physiotherapy" label="is physiotherapy" :checked="$test_name->is_physiotherapy" />
    <x-form.checkbox id="is_test" name="is_test" label="is test" :checked="$test_name->is_test" />
</div>

<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('test-name.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
