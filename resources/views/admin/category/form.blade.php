<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="category" type="text" id="title" value="{{ isset($category->category) ? $category->category : ''}}" >
    {!! $errors->first('category', '<p class="help-block" style="color:red;">:message</p>') !!}
</div>

 <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="p_category" class="control-label">{{ 'Category' }}</label>
    <select name="parent_category" class="form-control" id="" >
    <option value="0">Select</option>
    @foreach($categories as $category)
   <option value="{{ $category->id }}">{{ ucfirst($category->category)}}</option>
    @endforeach
    
   </select>
  
 </div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
