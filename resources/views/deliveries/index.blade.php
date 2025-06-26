<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <p class="title is-2">All the deliveries</p>
            </div>
            <div class="column">
                <a href="{{ route('deliveries.create') }}" class="button is-primary is-pulled-right">
                    Add a new delivery
                </a>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="content">
                        <table class="table is-fullwidth">
                            <tbody>
                            @foreach($deliveries as $delivery)
                                <tr style=@if($delivery->status == "delivered") "background: gray"@endif>
                                    <td>{{ $delivery->id }}</td>
                                    <td><a href="{{ route('deliveries.show',$delivery->id) }}">{{ $delivery->name }}</a></td>
                                    <td>{{ $delivery->status }}</td>
                                    <td>{{ $delivery->order_deadline }}</td>
                                    <td>
                                        <div class="field has-addons">
                                            <a href="{{ route('deliveries.edit',$delivery->id) }}" class="button is-primary is-pulled-right">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main>
