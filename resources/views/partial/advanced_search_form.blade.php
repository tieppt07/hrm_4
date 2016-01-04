<div class="row">
    <div class="col-xs-8 col-sm-offset-2">
        {!! Form::open(['url' => 'search', 'method' => 'GET', 'class' => 'form-group']) !!}
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::label('key', 'Advanced Search:', ['class' => 'control-label']) !!}
                    {!! Form::text('key', $key, ['class' => 'form-control', 'placeholder' => 'Enter name or email or phone', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::label('department', 'Department:', ['class' => 'control-label']) !!}
                    @foreach($departmentsList as $department)
                        <div class="radio-inline">
                            <label>
                                {!! Form::checkbox("department[]", $department->id) !!} {{ $department->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::label('position', 'Position:', ['class' => 'control-label']) !!}
                    @foreach($positionsList as $position)
                        <div class="radio-inline">
                            <label>
                                {!! Form::checkbox("position[]", $position->id) !!} {{ $position->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-2">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
