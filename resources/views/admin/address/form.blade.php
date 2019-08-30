<form>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($address->customername) ? $address->customername : ''}}" >
    {!! $errors->first('customername', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address1') ? 'has-error' : ''}}">
    <label for="address1" class="control-label">{{ 'Address1' }}</label>
    <input class="form-control" name="address1" type="text" id="address1" value="{{ isset($address->address1) ? $address->address1 : ''}}" >
    {!! $errors->first('address1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
    <label for="address2" class="control-label">{{ 'Address2' }}</label>
    <input class="form-control" name="address2" type="text" id="address2" value="{{ isset($address->address2) ? $address->address2 : ''}}" >
    {!! $errors->first('address2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('') ? 'has-error' : ''}}">
    <label for="country" class="control-label">{{ 'Country' }}</label>
    <select id="country" class="form-control" name="country">
        <option value="">Select country</option>
         @foreach($countries as $country)
         @if($address->countryID == $country->id)
        <option value="{{ $country->id }}" selected>{{ $country->country_name}}</option>
        @elseif($address->countryID != $country->id)
        <option value="{{ $country->id }}" >{{ $country->country_name}}</option>
        @endif
        @endforeach
    </select>
        
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('') ? 'has-error' : ''}}">
    <label for="state" class="control-label">{{ 'State' }}</label>
    <select id="state" class="form-control" name="state">
        @foreach($states as $state)
         @if($address->stateID == $state->id)
        <option value="{{ $state->id }}" selected>{{ucfirst(strtolower($state->name))}}</option>
        @endif
        @endforeach
       
    </select>
        
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
    <label for="city" class="control-label">{{ 'City' }}</label>
    <input class="form-control" name="city" type="text" id="city" value="{{ isset($address->city) ? $address->city : ''}}" >
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('zipcode') ? 'has-error' : ''}}">
    <label for="zipcode" class="control-label">{{ 'Zipcode' }}</label>
    <input class="form-control" name="zipcode" type="number" id="zipcode" value="{{ isset($address->zipcode) ? $address->zipcode : ''}}" >
    {!! $errors->first('zipcode', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mobno') ? 'has-error' : ''}}">
    <label for="mobno" class="control-label">{{ 'Mobno' }}</label>
    <input class="form-control" name="mobno" type="number" id="mobno" value="{{ isset($address->mobno) ? $address->mobno : ''}}" >
    {!! $errors->first('mobno', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
</form>
