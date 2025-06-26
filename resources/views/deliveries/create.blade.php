<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <p class="title is-2">Create a new Delivery</p>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="content">
                        <form action="{{ route('deliveries.store') }}" method="POST">
                            @csrf
                                <label for="inputName" class="form-label"><strong>Name:</strong></label><br>
                                <input
                                    value="{{ old('name') }}"
                                    type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="inputName"
                                    placeholder="Name">
                                @error('name')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            <br>

                                <label for="inputStatus" class="form-label"><strong>Status:</strong></label><br>
                                <input
                                    value="{{ old('status') }}"
                                    type="text"
                                    class="form-control @error('status') is-invalid @enderror"
                                    name="status"
                                    id="inputStatus"
                                    placeholder="planned">
                                @error('status')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            <br>

                                <label for="inputOrderDeadline" class="form-label"><strong>Order deadline:</strong></label><br>
                                <input
                                    value="{{ old('order_deadline') }}"
                                    type="datetime-local"
                                    class="form-control @error('order_deadline') is-invalid @enderror"
                                    name="order_deadline"
                                    id="inputOrderDeadline">
                                @error('order_deadline')
                                <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            <br><br>
                            <button type="submit" class="button is-primary">Save</button>
                            <a href="{{ route('deliveries.index') }}" class="button is-primary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main>
