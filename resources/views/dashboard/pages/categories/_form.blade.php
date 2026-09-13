<div class="card-body">
                        <div class="form-group">
                            {{-- <label for="exampleInputEmail1">category name</label>
                            <input type="text" name="name" class="form-control"  placeholder="Enter name" value="{{ old('name',$category->name) }}"> --}}
                            {{-- @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            
                            @endif --}}
                            {{-- @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror --}}
                            <x-form.input id="name" name="name" type="text" placeholder="Enter Category Name" label="Enter Category Name" :value="$category->name"/>
                        </div>
                    </div>