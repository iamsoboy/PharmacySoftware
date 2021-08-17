<div class="card card-preview">
    @if($saved)
        <div class="alert alert-icon alert-success my-2" role="alert">
            <em class="icon ni ni-check-circle"></em>
            <strong>Drug prices saved successfully.</strong>
        </div>
    @endif
    <div class="card-inner">

        <form wire:submit.prevent="saveForm">
            @csrf

                <table class="table table-responsive-sm table-bordered table-striped custom-table">
                    <thead>
                    <tr>
                        <th style="width: 300px">Drug Name</th>
                        @foreach($retainerships as $item)
                            <th>{{ strtoupper(substr($item->name, 0,3)) }}</th>
                        @endforeach
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tables as $key => $value)
                        <tr>
                            <td>
                                <select wire:model="templates.{{$key}}" class="form-control form-control-lg" data-search="on">
                                    <option value="">-- Select a Drug --</option>
                                    @foreach($all_drugs as $drug)
                                        <option value="{{$drug->code_no}}">{{$drug->product_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.private">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.brookstone">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.agip">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.belema">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.axamansard">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.avon">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.novo">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.hygeia">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.venus">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.hallmark">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.regenix">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.reliance">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.greenocean">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.leadway">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.tht">
                            </td>
                            <td>
                                <input type="text" wire:model="tables.{{$key}}.abua">
                            </td>
                            <td>
                                <button wire:click.prevent="removeTable({{$key}})"  class="btn btn-icon btn-outline-danger"><em class="icon ni ni-cross"></em></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="justify-between mt-2">
                    <button class="btn btn-icon btn-primary" wire:click.prevent="addTable"><em class="icon ni ni-plus"></em></button>
                    <button  type="submit" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-capsule-fill"></em><span>Submit</span></button>
                </div>


        </form>


    </div>
</div><!-- .card-preview -->
