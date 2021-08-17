<div class="form-control-select">
    <select wire:model="selectedTariff" class="custom-select form-control-outlined" id="retainership" name="retainership">
        @foreach($retainerships as $retainership)
            <option value="{{$retainership->name_price}}">{{$retainership->name}} Tariff</option>
        @endforeach
    </select>
    <!--<label class="form-label-outlined" for="retainership">Retainership</label>-->
</div>
