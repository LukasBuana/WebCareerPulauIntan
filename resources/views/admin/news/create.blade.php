<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .form-group { margin-bottom: 15px; }
        .form-control { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn-action { margin-top: 20px; }
        textarea.form-control { min-height: 100px; resize: vertical; }
        input[type="file"] { padding: 5px 0; }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Tambah Berita Baru</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="block">
                    <div class="title"><strong>Form Berita Baru</strong></div>
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

                        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Judul Berita</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" maxlength="100" required>
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Sub Judul</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" maxlength="100" required>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}" maxlength="100" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" maxlength="255" required>{{ old('description') }}</textarea>
                                <small class="form-text text-muted">Maksimal 255 karakter.</small>
                            </div>

                            <div class="form-group">
                                <label for="image">Gambar Berita</label>
                                <input type="file" class="form-control-file" id="image" name="image" required accept="image/*">
                                <small class="form-text text-muted">Format: JPG, PNG, GIF, SVG. Maks: 2MB.</small>
                            </div>

                            <button type="submit" class="btn btn-primary btn-action">Simpan Berita</button>
                            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-action">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>