<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Staff</h4>
            </div>
            {!! Form::open(['method' => 'POST', 'url' => 'users/']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('name', 'Name:', ['class' => 'control-lable']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('email', 'Email:', ['class' => 'control-lable']) !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('password', 'Password:', ['class' => 'control-lable']) !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('department', 'Department:', ['class' => 'control-label']) !!}
                            {!! Form::select('department_id', $departments, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('position', 'Position:', ['class' => 'control-label']) !!}
                            {!! Form::select('position_id', $positions, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('phone', 'Phone:', ['class' => 'control-lable']) !!}
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('place_of_birth', 'Place of Birth:', ['class' => 'control-lable']) !!}
                            {!! Form::text('place_of_birth', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('status', 'Status:', ['class' => 'control-lable']) !!}
                            {!! Form::select('status', config('constant.status'), null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('birthday', 'Birthday (mm/dd/yyyy):', ['class' => 'control-lable']) !!}
                            {!! Form::input('date', 'birthday', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary'] ) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
