<!-- Modal -->
<div class="modal fade" id="editModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit user</h4>
            </div>
            {!! Form::open(['method' => 'PATCH', 'url' => "users/{$user->id}"]) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('name', 'Name:', ['class' => 'control-lable']) !!}
                            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('email', 'Email:', ['class' => 'control-lable']) !!}
                            {!! Form::email('email', $user->email, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('department', 'Department:', ['class' => 'control-label']) !!}
                            @if (isset($user->department_id))
                                {!! Form::select('department_id', $departments, $user->department_id, ['class' => 'form-control']) !!}
                            @else
                                {!! Form::select('department_id', $departments, null, ['class' => 'form-control']) !!}
                            @endif
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('position', 'Position:', ['class' => 'control-label']) !!}
                            @if (isset($user->position_id))
                                {!! Form::select('position_id', $positions, $user->position_id, ['class' => 'form-control']) !!}
                            @else
                                {!! Form::select('position_id', $positions, null, ['class' => 'form-control']) !!}
                            @endif
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('phone', 'Phone:', ['class' => 'control-lable']) !!}
                            {!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('place_of_birth', 'Place of Birth:', ['class' => 'control-lable']) !!}
                            {!! Form::text('place_of_birth', $user->place_of_birth, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('status', 'Status:', ['class' => 'control-lable']) !!}
                            {!! Form::select('status', config('constant.status'), $user->status, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6">
                            {!! Form::label('birthday', 'Birthday (mm/dd/yyyy):', ['class' => 'control-lable']) !!}
                            {!! Form::input('date', 'birthday', $user->birthday, ['class' => 'form-control']) !!}
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
