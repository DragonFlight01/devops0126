<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <p class="title is-2">Delivery {{ $delivery->id }}</p>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="content">
                        <div class="container">
                            <div class="columns">
                                <div class="column is-1"><b>ID :</b></div>
                                <div class="column"><p>{{ $delivery->id }}</p></div>
                            </div>
                            <div class="columns">
                                <div class="column is-1"><b>Name :</b></div>
                                <div class="column"><p>{{ $delivery->name }}</p></div>
                            </div>
                            <div class="columns">
                                <div class="column is-1"><b>Status :</b></div>
                                <div class="column"><p>{{ $delivery->status }}</p></div>
                            </div>
                            <div class="columns">
                                <div class="column is-1"><b>Order Deadline :</b></div>
                                <div class="column"><p>{{ $delivery->order_deadline }}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main>
