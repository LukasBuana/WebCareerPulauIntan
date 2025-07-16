<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .form-group { margin-bottom: 15px; }
        .form-control { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .form-check-label { margin-left: 10px; }
        .btn-action { margin-top: 20px; }
        select.form-control { height: auto; }
        textarea.form-control { min-height: 100px; resize: vertical; }
        /* Gaya untuk input dinamis */
        .dynamic-input-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Tambah Lowongan Pekerjaan Baru</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="block">
                    <div class="title"><strong>Form Lowongan Baru</strong></div>
                    <div class="block-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.jobs.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="title">Judul Lowongan</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="job_category_id">Kategori</label>
                                <select class="form-control" id="job_category_id" name="job_category_id" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('job_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="job_location_id">Lokasi</label>
                                <select class="form-control" id="job_location_id" name="job_location_id" required>
                                    <option value="">Pilih Lokasi</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}" {{ old('job_location_id') == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="job_type_id">Tipe Pekerjaan</label>
                                <select class="form-control" id="job_type_id" name="job_type_id">
                                    <option value="">Pilih Tipe (Opsional)</option>
                                    @foreach($jobTypes as $type)
                                        <option value="{{ $type->id }}" {{ old('job_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Deskripsi Pekerjaan</label>
                                <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="responsibilities">Tanggung Jawab</label>
                                <textarea class="form-control" id="responsibilities" name="responsibilities">{{ old('responsibilities') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="qualifications">Kualifikasi</label>
                                <textarea class="form-control" id="qualifications" name="qualifications">{{ old('qualifications') }}</textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="min_salary">Gaji Minimum</label>
                                    <input type="number" class="form-control" id="min_salary" name="min_salary" value="{{ old('min_salary') }}" min="0">
                                </div>
                                <div class="col-md-6">
                                    <label for="max_salary">Gaji Maksimum</label>
                                    <input type="number" class="form-control" id="max_salary" name="max_salary" value="{{ old('max_salary') }}" min="0">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="salary_currency">Mata Uang Gaji</label>
                                <input type="text" class="form-control" id="salary_currency" name="salary_currency" value="{{ old('salary_currency', 'IDR') }}" maxlength="10" readonly>
                            </div>

                            <div class="form-group">
                                <label for="experience_level">Level Pengalaman</label>
                                <select class="form-control" id="experience_level" name="experience_level">
                                    <option value="">Pilih Level (Opsional)</option>
                                    <option value="Entry Level" {{ old('experience_level') == 'Entry Level' ? 'selected' : '' }}>Entry Level</option>
                                    <option value="Junior" {{ old('experience_level') == 'Junior' ? 'selected' : '' }}>Junior</option>
                                    <option value="Mid" {{ old('experience_level') == 'Mid' ? 'selected' : '' }}>Mid</option>
                                    <option value="Senior" {{ old('experience_level') == 'Senior' ? 'selected' : '' }}>Senior</option>
                                    <option value="Lead" {{ old('experience_level') == 'Lead' ? 'selected' : '' }}>Lead</option>
                                    <option value="Manager" {{ old('experience_level') == 'Manager' ? 'selected' : '' }}>Manager</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="education_level">Tingkat Pendidikan</label>
                                <input type="text" class="form-control" id="education_level" name="education_level" value="{{ old('education_level') }}" maxlength="100">
                            </div>

                            <div class="form-group">
                                <label for="application_deadline">Batas Akhir Lamaran</label>
                                <input type="date" class="form-control" id="application_deadline" name="application_deadline" value="{{ old('application_deadline') }}">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Published" {{ old('status', 'Draft') == 'Published' ? 'selected' : '' }}>Published</option>
                                    <option value="Draft" {{ old('status', 'Draft') == 'Draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="Closed" {{ old('status') == 'Closed' ? 'selected' : '' }}>Closed</option>
                                    <option value="Archived" {{ old('status') == 'Archived' ? 'selected' : '' }}>Archived</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">Tandai sebagai Unggulan</label>
                                </div>
                            </div>

                            

                            {{-- --- BAGIAN: PERSYARATAN PEKERJAAN --- --}}
                            <div class="form-group">
                                <label>Persyaratan Pekerjaan</label>
                                <div id="requirements-container">
                                    {{-- Input dinamis akan ditambahkan di sini oleh JavaScript --}}
                                </div>
                                <button type="button" class="btn btn-info btn-sm mt-2" id="add-requirement">Tambah Persyaratan</button>
                            </div>

                            {{-- --- BAGIAN: MANFAAT PEKERJAAN --- --}}
                            <div class="form-group">
                                <label>Manfaat Pekerjaan</label>
                                <div id="benefits-container">
                                    {{-- Input dinamis akan ditambahkan di sini oleh JavaScript --}}
                                </div>
                                <button type="button" class="btn btn-info btn-sm mt-2" id="add-benefit">Tambah Manfaat</button>
                            </div>
                            <div class="form-group">
                                <label>Keterampilan yang Dibutuhkan</label>
                                <div>
                                    @foreach($skills as $skill)
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" class="form-check-input" id="skill_{{ $skill->id }}" name="skills[]" value="{{ $skill->id }}" {{ in_array($skill->id, old('skills', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="skill_{{ $skill->id }}">{{ $skill->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-action">Simpan Lowongan</button>
                            <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary btn-action">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.js')
    <script>
        // Fungsi untuk menambahkan input baru (dengan nilai opsional)
        function addDynamicInput(containerId, inputName, placeholder, value = '') {
            const container = document.getElementById(containerId);
            const div = document.createElement('div');
            div.classList.add('dynamic-input-group');
            div.innerHTML = `
                <input type="text" class="form-control" name="${inputName}[]" value="${value}" placeholder="${placeholder}">
                <button type="button" class="btn btn-danger btn-remove">Hapus</button>
            `;
            container.appendChild(div);

            const inputField = div.querySelector('input');
            const removeButton = div.querySelector('.btn-remove');

            // Atur visibilitas tombol hapus dan tambahkan event listener untuk memantau perubahan input
            toggleRemoveButtonVisibility(inputField, removeButton);
            inputField.addEventListener('input', () => toggleRemoveButtonVisibility(inputField, removeButton));
            inputField.addEventListener('change', () => toggleRemoveButtonVisibility(inputField, removeButton));
        }

        // Fungsi untuk mengontrol visibilitas tombol hapus untuk SATU input group
        function toggleRemoveButtonVisibility(inputField, removeButton) {
            if (inputField.value.trim() !== '') {
                removeButton.style.display = 'inline-block'; // Tampilkan jika ada nilai
            } else {
                removeButton.style.display = 'none'; // Sembunyikan jika kosong
            }
        }

        // Fungsi untuk validasi semua input dalam container (sebelum menambah baru)
        function validateContainerInputs(containerId) {
            const container = document.getElementById(containerId);
            const inputs = container.querySelectorAll('input[type="text"]');
            let allValid = true;
            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    input.classList.add('is-invalid'); // Tandai input kosong
                    allValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            return allValid;
        }

        // Event listener untuk tombol "Tambah Persyaratan"
        document.getElementById('add-requirement').addEventListener('click', function() {
            if (validateContainerInputs('requirements-container')) {
                addDynamicInput('requirements-container', 'requirements', 'Contoh: Gelar S1 di bidang terkait');
                // Focus on the newly added input
                const newInputs = document.querySelectorAll('#requirements-container .dynamic-input-group input');
                if (newInputs.length > 0) {
                    newInputs[newInputs.length - 1].focus();
                }
            } else {
                alert('Harap isi persyaratan yang sudah ada terlebih dahulu.');
            }
        });

        // Event listener untuk tombol "Tambah Manfaat"
        document.getElementById('add-benefit').addEventListener('click', function() {
            if (validateContainerInputs('benefits-container')) {
                addDynamicInput('benefits-container', 'benefits', 'Contoh: Asuransi Kesehatan');
                // Focus on the newly added input
                const newInputs = document.querySelectorAll('#benefits-container .dynamic-input-group input');
                if (newInputs.length > 0) {
                    newInputs[newInputs.length - 1].focus();
                }
            } else {
                alert('Harap isi manfaat yang sudah ada terlebih dahulu.');
            }
        });

        // Event listener untuk menghapus input dinamis (menggunakan event delegation)
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('btn-remove')) {
                const group = event.target.closest('.dynamic-input-group');
                if (group) {
                    const inputField = group.querySelector('input');
                    const container = group.parentElement;
                    const containerId = container.id;
                    const totalInputGroups = container.querySelectorAll('.dynamic-input-group').length;

                    // Logika: Jika ini adalah input TERAKHIR, bersihkan saja, jangan hapus.
                    if (totalInputGroups === 1) {
                        inputField.value = ''; // Kosongkan field
                        toggleRemoveButtonVisibility(inputField, event.target); // Sembunyikan tombol hapus
                        inputField.focus(); // Beri fokus kembali ke field yang dikosongkan
                        inputField.classList.remove('is-invalid'); // Hapus tanda invalid jika ada
                    } else {
                        // Jika bukan input terakhir, hapus barisnya
                        group.remove();
                    }
                    
                    // After action, revalidate all remaining inputs (to remove invalid flags)
                    // No need to re-validate on removal unless you want to clean up existing marks
                    // validateContainerInputs(containerId); // Optional: if you want to clean up marks on other fields
                }
            }
        });

        // Pada saat DOMContentLoaded, render data 'old' dan atur visibilitas awal
        document.addEventListener('DOMContentLoaded', function() {
            const oldRequirements = @json(old('requirements', []));
            const oldBenefits = @json(old('benefits', []));

            // Render old data for requirements
            if (oldRequirements.length > 0) {
                oldRequirements.forEach(req => {
                    addDynamicInput('requirements-container', 'requirements', 'Contoh: Gelar S1 di bidang terkait', req);
                });
            } else {
                addDynamicInput('requirements-container', 'requirements', 'Contoh: Gelar S1 di bidang terkait');
            }

            // Render old data for benefits
            if (oldBenefits.length > 0) {
                oldBenefits.forEach(benefit => {
                    addDynamicInput('benefits-container', 'benefits', 'Contoh: Asuransi Kesehatan', benefit);
                });
            } else {
                addDynamicInput('benefits-container', 'benefits', 'Contoh: Asuransi Kesehatan');
            }

            // No initial validation or focus on load for dynamic inputs to prevent red borders on first load
            // The validation and focus now only occur when the "Tambah" button is clicked.
        });
    </script>
</body>
</html>