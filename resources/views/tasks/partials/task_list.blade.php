{{-- resources/views/tasks/partials/task_list.blade.php --}}

@if($tasks->isEmpty())
    <p class="text-muted" style="color: #ccc; text-align: center; margin-top: 30px;">Görev bulunamadı.</p>
@else
    @foreach ($tasks as $task)
        <div class="card mb-2
            @if($task->status === 'done') card-status-done
            @elseif($task->status === 'in_progress') card-status-in-progress
            @endif
            ">
            <div class="card-body">
                <div class="task-header-row"> {{-- Wrapper for title, type/team info, assigned badges, and checkbox --}}
                    <div class="task-title-and-type">
                        <h5>{{ $task->title }}</h5>
                        @if ($task->type === 'personal')
                            <span class="task-type-badge personal">Kişisel</span>
                        @else
                            @if ($task->team)
                                <span class="task-type-badge team">{{ $task->team->name }} Takımı</span>
                            @else
                                <span class="task-type-badge no-team">Takım Seçilmedi</span>
                            @endif
                        @endif
                    </div>

                    <div class="task-owner-assigned-badges"> {{-- Wrapper for owner/assigned badges --}}
                        @if ($task->user_id === auth()->id())
                            <span class="badge badge-owner">Oluşturan Sensin</span>
                        @elseif ($task->assignedUsers->contains(auth()->id()))
                            <span class="badge badge-assigned">
                                {{ $task->team->owner->name ?? 'Bilinmeyen Kişi' }} tarafından atandı
                            </span>
                        @endif
                    </div>

                    {{-- Checkbox form --}}
                    <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" id="form-{{ $task->id }}" class="task-status-form">
                        @csrf
                        <input type="hidden" name="status" id="status-input-{{ $task->id }}" value="{{ $task->status }}">
                        <input type="checkbox" id="task_completed_{{ $task->id }}"
                               name="completed_checkbox"
                               class="task-status-checkbox"
                               {{ $task->status === 'done' ? 'checked' : '' }}
                               onchange="toggleStatus('{{ $task->id }}', this.checked)">
                        <label for="task_completed_{{ $task->id }}" class="sr-only">Görevi Tamamla</label>
                    </form>
                </div>
                {{-- End of task-header-row --}}

                <p class="task-description">{{ $task->description }}</p>
                <p class="task-meta">Durum: @if ($task->status === 'todo')
                    <span class="badge badge-secondary">Yapılacak</span>
                    @elseif ($task->status === 'in_progress')
                    <span class="badge badge-primary">Devam Ediyor</span>
                    @else ($task->status === 'done')
                    <span class="badge badge-success">Tamamlandı</span>
                    @endif
                </p>
                <p class="task-meta"><strong>Oluşturulma Tarihi:</strong> {{ $task->created_at->format('d-m-Y H:i') }}</p>
                <p class="task-meta"><strong>Son Tarih:</strong> {{ $task->due_date }}</p>

                <div class="task-actions-bottom">
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Düzenle</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Görevi silmek istediğinden emin misin?')">Sil</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endif
