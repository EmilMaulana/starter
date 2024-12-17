<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p>Silakan unduh template untuk mengimpor data siswa dan isi sesuai dengan format yang ditentukan.</p>
                    <button wire:click='template' class="btn btn-info mb-2">
                        <i class="fas fa-download"></i> Download
                    </button>
                    <form wire:submit.prevent="import">
                        <div class="custom-file mb-2 mt-5" wire:ignore>
                            <input type="file" wire:model="file" required class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">IMPORT DATA</button>
                    </form>
    
                    @if (session()->has('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('customFile');
            const fileLabel = document.querySelector('.custom-file-label');
    
            fileInput.addEventListener('change', function () {
                if (fileInput.files.length > 0) {
                    fileLabel.textContent = fileInput.files[0].name;
                } else {
                    fileLabel.textContent = 'Choose file';
                }
            });
        });
    </script>
</div>
