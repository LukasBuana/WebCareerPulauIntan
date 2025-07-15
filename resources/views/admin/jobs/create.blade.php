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

</body>
</html>