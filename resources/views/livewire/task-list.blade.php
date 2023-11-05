<div>
    <div class="container">
        <div class="row justify-content-center d-flex align-items-center" style="height: 100vh">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create Task</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" wire:model="body" placeholder="Create New Task" required>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary" wire:click="submit">Submit</button>
                        </div>
                    </div>
                    <ul class="list-group" wire:sortable="updateTaskOrder">
                        @foreach ($tasks as $item)
                        <li class="list-group-item d-flex justify-content-between" wire:sortable.item="{{ $item->id }}" wire:key="task-{{ $item->id }}">
                            <h1 wire:sortable.handle role="button">{{ $item->body }}</h1>
                            <button class="btn btn-danger" wire:click="delete({{ $item->id }})">Delete</button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
