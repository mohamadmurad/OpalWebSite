<div  style="padding: 15px">
    <label>Start date</label>
    <input  class="form-control"  type="date" wire:model="start_date">
    @error('start_date') <span class="error">{{ $message }}</span> @enderror
    <label>end date</label>
    <input  class="form-control"  type="date" wire:model="end_date">
    @error('end_date') <span class="error">{{ $message }}</span> @enderror


    <div class="table-responsive">
        <table class="table align-middle" >
            <thead class="table-light">
            <tr>

                <th scope="col">Branch Name</th>
                <th scope="col">Phone Count</th>
            </tr>
            </thead>
            <tbody>

            @foreach($customers as $c)
                <tr>

                    <td>{{$c['branch_name']}}</td>
                    <td>{{$c['phone_count']}}</td>
                </tr>

            @endforeach
            <tfoot>
            <td>All</td>
            <td>{{$total}}</td>
            </tfoot>
            </tbody>
        </table>
    </div>
</div>
